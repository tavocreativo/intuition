// Utilidades de mensaje
function showMessage(type, message) {
  const success = $("#contactSuccess");
  const error = $("#contactError");

  if (type === "success") {
    error.addClass("d-none");
    success.removeClass("d-none").text(message);
    setTimeout(() => success.addClass("d-none"), 3000);
  } else {
    success.addClass("d-none");
    error.removeClass("d-none").text(message);
  }
}

// Validación de email
function validateEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(String(email).toLowerCase());
}

// Validación de entradas
function validateInput(input) {
  const pattern =
    /[@<>\/\\$#]|<script.*?>.*?<\/script>|javascript:|('|;|--|\/\*|\*\/|select|insert|update|delete|drop|union)|https?:\/\/|www\./gi;
  return !pattern.test(input);
}

// Botón loading
function setButtonState(button, isLoading) {
  let textsend = lang == "es" ? "Enviando..." : "Sending";
  let resettextsend = lang == "es" ? "Enviar formulario" : "Send message";
  button.find("span").text(isLoading ? textsend : resettextsend);
  button.css({
    cursor: isLoading ? "not-allowed" : "pointer",
    opacity: isLoading ? "0.5" : "1",
  });
}

// Validación de campos peligrosos en tiempo real
function bindLiveValidation(fields) {
  const error = document.createElement("div");
  error.id = "comment-error";
  error.style.color = "red";
  error.style.marginTop = "5px";

  fields.forEach((field) => {
    if (field.type === "email") return;
    field.addEventListener("input", () => {
      if (!validateInput(field.value)) {
        error.textContent =
          lang == "es"
            ? "No se permite contenido peligroso."
            : "Dangerous content is not allowed";
        field.parentNode.appendChild(error);
        field.value = field.value.replace(/<.*?>/g, "");
      } else {
        error.textContent = "";
      }
    });
  });
}


document.addEventListener("DOMContentLoaded", function () {
  // Envío de formulario
  const $form = $("#form-contact");
  const $button = $("#send-email-contact");
  const $fields = $form.find("input, textarea, select");

  const fields = {};
  $fields.each(function () {
    const name = $(this).attr("name");
    if (name) {
      fields[name] = $(this);
    }
  });
  // Validación en vivo
  bindLiveValidation(
    Object.values(fields).map(($field) => $field[0])
  );

  $form.on("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const values = Object.fromEntries(formData.entries());

    let valid = true;

    $form.find("input, textarea, select").each(function () {
      const $field = $(this);
      const name = $field.attr("name");
      // ⚠️ Ignorar campos internos de WP
      if (name === '_wp_http_referer' || name === 'mi_nonce') {
        return true; // continuar con el siguiente
      }
      const value = $field.val().trim();
      const type = $field.attr("type") || this.tagName.toLowerCase();
      const required = $field.prop("required");
      const label = $field.data("field") || $field.attr("name");

      // Validar requeridos
      if (required && !value) {
        showMessage("error", `${messages[lang].required_message} (${label})`);
        $field.focus();
        valid = false;
        return false;
      }

      // Validar emails
      if (type === "email" && value && !validateEmail(value)) {
        showMessage("error", `${messages[lang].invalid_email} (${label})`);
        $field.focus();
        valid = false;
        return false;
      }

      if (value) {
        // solo validar contenido peligroso si NO es email
        if ($field.attr("type") !== "email" && !validateInput(value)) {
          const msg =
            lang === "es"
              ? `Contenido no permitido en ${label}`
              : `Not allowed content in ${label}`;
          showMessage("error", msg);
          $field.focus();
          valid = false;
          return false;
        }
      }
    });

    if (!valid) return;

    grecaptcha.execute();
  });
});

function enviarFormulario(token) {

  const $form = $("#form-contact");
  const $button = $("#send-email-contact");

  const values = {};
  $form.find("input[name], textarea[name], select[name]").each(function () {
    const fieldName = $(this).attr("name"); // ej: "nombre-completo"
    const fieldValue = $(this).val();
    values[fieldName] = fieldValue;
  });
  values.recaptchaResponse = token;

  setButtonState($button, true);

  $.ajax({
    url: ajaxUrlAdmin,
    type: "POST",
    data: {
      action: "send_mail_form_contact",
      ...values,
    },
    success: handleAjaxResponse,
    error: handleAjaxError,
  });

  function handleAjaxResponse(response) {
    console.log(response);
    
    let message;
    try {
      if (response.success) {
        message = lang == "es" ? "Mensaje enviado correctamente" : "Message sent successfully";
        showMessage("success", message);
        $form[0].reset();
      } else {
        message = lang == "es" ? "Error al enviar el correo" : "Error sending email";
        showMessage("error", "Error: " + message);
        if (response.data && response.data.debug) {
          console.error("DEBUG Mailer:", response.data.debug);
        }
      }
    } catch (e) {
      console.error("Error parsing JSON:", e);
      message = lang == "es" ? "Respuesta inválida del servidor" : "Invalid response from the server";
      showMessage("error", message);
    }
    grecaptcha.reset();
    setButtonState($button, false);
  }

  function handleAjaxError(xhr, status, error) {
    console.log(xhr, status, error);
    
    console.error("AJAX error:", xhr, status, error);
    const message = lang == "es" ? "Error al enviar el correo" : "Error sending email";
    showMessage("error", message);
    setButtonState($button, false);
    grecaptcha.reset();
  } 
  
}

const messages = {
  es: {
    required_message: "Debe completar el campo",
    invalid_email: "Email no válido",
  },
  en: {
    required_message: "You must complete the field",
    invalid_email: "Invalid email",
  },
};