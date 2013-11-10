<?php

return array(
  /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
   */

  "accepted" => "הינך חייב לקבל שדה זה",
  "active_url" => "שדה זה אינו URL תקין",
  "after" => "שדה זה חייב להכיל תאריך אחרי :date",
  "alpha" => "שדה זה חייב להכיל אותיות בלבד",
  "alpha_dash" => "שדה זה חייב להכיל אותיות, מספרים ומקפים בלבד",
  "alpha_num" => "שדה זה יכול להכיל אותיות ומספרים בלבד",
  "array" => "שדה זה חייב להיות מערך",
  "before" => "שדה זה חייב להכיל תאריך לפני :date",
  "between" => array(
    "numeric" => "שדה זה חייב לקבל ערך בין :min ל :max",
    "file" => "גודל הקובץ חייב להיות בין :minל :max קילובייט",
    "string" => "אורך שדה זה חייב להיות בין :min ל :max",
    "array" => "שדה זה חייב להכיל בין :min ל:max פריטים",
  ),
  "confirmed" => "אימות שדה זה אינו תואם את הערך המקורי",
  "date" => "שדה זה חייב להכיל תאריך בפורמט תקין",
  "date_format" => "שדה זה חייב להיות תואם לפורמט :format",
  "different" => "The :attribute and :other must be different.",
  "digits" => "שדה זה חייב להכיל :digits ספרות",
  "digits_between" => "שדה זה חייב להכיל בין :min ל :max ספרות",
  "email" => "שדה זה חייב להכיל כתובת אימייל",
  "exists" => "שדה זה אינו תקין",
  "image" => "שדה זה חייב להכיל תמונה",
  "in" => "שדה זה אינו תקין",
  "integer" => "שדה זה חייב להכיל מספר שלם",
  "ip" => "שדה זה חייב להכיל כתובת IP תקינה",
  "max" => array(
    "numeric" => "שדה זה חייב להכיל ערך נמוך מ :max",
    "file" => "גודל הקובץ חייב להיות קטן מ :max",
    "string" => "שדה זה אינו יכול להכיל יותר מ :max תוים",
    "array" => "שדה זה אינו יכול להכיל יותר מ :max פריטים",
  ),
  "mimes" => "שדה זה חייב להכיל קבצים מסוג: :types",
  "min" => array(
    "numeric" => "שדה זה חייב להכיל מספר הגדול מ :min",
    "file" => "גודל הקובץ המינימלי הינו :min",
    "string" => "שדה זה חייב להכיל לפחות :min תוים",
    "array" => "שדה זה חייב להכיל לפחות :min פריטים",
  ),
  "not_in" => "הערך הנבחר אינו תקין",
  "numeric" => "שדה זה חייב להכיל מספר",
  "regex" => "שדה זה מכיל ערך בפורמט שאינו תקין",
  "required" => "שדה זה הינו שדה חובה",
  "required_if" => "The :attribute field is required when :other is :value.",
  "required_with" => "The :attribute field is required when :values is present.",
  "required_without" => "The :attribute field is required when :values is not present.",
  "same" => "שדה זה חייב להיות תואם ל:attribute",
  "size" => array(
    "numeric" => "שדה זה חייב להיות שווה ל :size",
    "file" => "גודל קובץ זה חייב להיות בדיוק :size קילובייטים",
    "string" => "שדה זה חייב להכיל בדיוק :size ספרות",
    "array" => "שדה זה חייב להכיל בדיוק :size פריטים",
  ),
  "unique" => "ערך זה כבר תפוס",
  "url" => "שדה זה אינו בפורמט URL תקין",
  "involved" => "בעיה במעורבים",
	"area_code" => "קידומת אינה חוקית",
	"count_max" => "אינך יכול לשמור יותר מ:max פריטים",
  /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
   */
  'custom' => array(),
  /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
   */
  'attributes' => array(),
);
