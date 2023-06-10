<?php
function encrypt($text, $key) {
  $result = "";
  $text = strtolower($text);
  $key = strtolower($key);

  $textLength = strlen($text);
  $keyLength = strlen($key);

  for ($i = 0; $i < $textLength; $i++) {
    $char = $text[$i];

    if (ctype_alpha($char)) {
      $keyChar = $key[$i % $keyLength];
      $shift = ord($keyChar) - 97;

      $ascii = ord($char);
      $encryptedAscii = (($ascii - 97 + $shift) % 26) + 97;
      $result .= chr($encryptedAscii);
    } else {
      $result .= $char; // Preserve non-alphabetic characters
    }
  }

  return $result;
}

function decrypt($text, $key) {
  $result = "";
  $text = strtolower($text);
  $key = strtolower($key);

  $textLength = strlen($text);
  $keyLength = strlen($key);

  for ($i = 0; $i < $textLength; $i++) {
    $char = $text[$i];

    if (ctype_alpha($char)) {
      $keyChar = $key[$i % $keyLength];
      $shift = ord($keyChar) - 97;

      $ascii = ord($char);
      $decryptedAscii = (($ascii - 97 - $shift + 26) % 26) + 97;
      $result .= chr($decryptedAscii);
    } else {
      $result .= $char; // Preserve non-alphabetic characters
    }
  }

  return $result;
}

$inputText = $_POST["inputText"];
$action = $_POST["action"];
$key = $_POST["key"];

if ($action === "encrypt") {
  $result = encrypt($inputText, $key);
} elseif ($action === "decrypt") {
  $result = decrypt($inputText, $key);
} else {
  $result = "Invalid action";
}

echo $result;
?>
