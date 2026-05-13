<?php
/**
 * WPForms Integration & Styling
 *
 * Styles WPForms to match ViaR design system
 *
 * @package ViaR_Luxury
 */

/**
 * Add custom styles for WPForms.
 */
function viar_wpforms_custom_styles(): void {
    if (!function_exists('wpforms')) {
        return;
    }
    ?>
    <style id="viar-wpforms-styles">
    .wpforms-container {
        font-family: 'Manrope', sans-serif !important;
    }

    .wpforms-form {
        max-width: 100% !important;
    }

    .wpforms-field-label {
        font-family: 'Manrope', sans-serif !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.15em !important;
        color: #1a1c1c !important;
        margin-bottom: 0.5rem !important;
    }

    .wpforms-field-label-inline {
        font-size: 16px !important;
        text-transform: none !important;
        letter-spacing: normal !important;
        font-weight: 400 !important;
    }

    .wpforms-required-label {
        color: #C5A059 !important;
    }

    .wpforms-field input[type="text"],
    .wpforms-field input[type="email"],
    .wpforms-field input[type="tel"],
    .wpforms-field input[type="url"],
    .wpforms-field input[type="number"],
    .wpforms-field input[type="date"],
    .wpforms-field textarea,
    .wpforms-field select {
        width: 100% !important;
        border: 1px solid #74777f !important;
        border-radius: 0 !important;
        font-family: 'Manrope', sans-serif !important;
        font-size: 16px !important;
        line-height: 1.6 !important;
        padding: 0.75rem 1rem !important;
        background-color: #fff !important;
        color: #1a1c1c !important;
        transition: border-color 0.3s ease, box-shadow 0.3s ease !important;
    }

    .wpforms-field input:focus,
    .wpforms-field textarea:focus,
    .wpforms-field select:focus {
        border-color: #C5A059 !important;
        outline: none !important;
        box-shadow: 0 0 0 1px #C5A059 !important;
    }

    .wpforms-field textarea {
        min-height: 150px !important;
        resize: vertical !important;
    }

    .wpforms-field input::placeholder,
    .wpforms-field textarea::placeholder {
        color: #43474e !important;
        opacity: 0.7 !important;
    }

    .wpforms-field select {
        appearance: none !important;
        background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L6 6L11 1' stroke='%2300234B' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E") !important;
        background-repeat: no-repeat !important;
        background-position: right 1rem center !important;
        background-size: 12px 8px !important;
        padding-right: 3rem !important;
    }

    .wpforms-submit-container {
        text-align: left !important;
        margin-top: 2rem !important;
    }

    .wpforms-submit,
    .wpforms-submit-container button[type="submit"] {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        background-color: #C5A059 !important;
        color: #00234B !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        font-weight: 500 !important;
        font-family: 'Manrope', sans-serif !important;
        font-size: 14px !important;
        padding: 1rem 2.5rem !important;
        border: none !important;
        border-radius: 0 !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
    }

    .wpforms-submit:hover,
    .wpforms-submit-container button[type="submit"]:hover {
        background-color: #00234B !important;
        color: #fff !important;
        transform: translateY(-1px) !important;
    }

    .wpforms-submit:active,
    .wpforms-submit-container button[type="submit"]:active {
        transform: translateY(0) !important;
    }

    .wpforms-error {
        color: #dc2626 !important;
        font-size: 14px !important;
        margin-top: 0.5rem !important;
    }

    .wpforms-field.wpforms-has-error input,
    .wpforms-field.wpforms-has-error textarea,
    .wpforms-field.wpforms-has-error select {
        border-color: #dc2626 !important;
    }

    .wpforms-confirmation-container-full {
        background-color: #C5A059 !important;
        color: #fff !important;
        padding: 2rem !important;
        text-align: center !important;
        border-radius: 0 !important;
        font-family: 'Manrope', sans-serif !important;
    }

    .wpforms-confirmation-container-full p {
        color: #fff !important;
        margin: 0 !important;
    }

    .wpforms-field-description {
        font-size: 14px !important;
        color: #43474e !important;
        margin-top: 0.5rem !important;
    }

    .wpforms-field-checkbox input[type="checkbox"],
    .wpforms-field-radio input[type="radio"] {
        width: auto !important;
        margin-right: 0.5rem !important;
        accent-color: #C5A059 !important;
    }

    .wpforms-uploader {
        border: 2px dashed #74777f !important;
        border-radius: 0 !important;
        padding: 2rem !important;
        text-align: center !important;
        background-color: #F9F9F9 !important;
    }

    .wpforms-container *,
    .wpforms-container *::before,
    .wpforms-container *::after {
        border-radius: 0 !important;
    }

    @media (max-width: 768px) {
        .wpforms-field input,
        .wpforms-field textarea,
        .wpforms-field select {
            font-size: 16px !important;
        }
    }
    </style>
    <?php
}
add_action('wp_head', 'viar_wpforms_custom_styles', 100);
