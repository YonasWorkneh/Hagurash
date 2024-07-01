<?php
session_start();
$id = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : '';


require("../../models/php/conn.php");

$result = $conn->query("SELECT * FROM users WHERE user_id = '$id'");
$email = '';
$status = 0;
$row = $result->fetch_assoc();
if ($result->num_rows) {
  $email = $row['email'];
  $status = $row['status'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../assets/CSS/pay.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/x-icon" />
  <script src="https://js.stripe.com/v3/"></script>
  <script type="module" src="../../controllers/checkout.js" defer></script>
  <title>Payment | Hagurash</title>
</head>

<body>
  <div class="hero">
    <div class="header">
      <div class="logo">
        <i class="fa-solid fa-arrow-left"></i>
        <img src="../../../assets/images/Logo.png" alt="hagurash logo" class="idc" />
        <span class="back hidden">Back</span>
      </div>
      <div class="product__info">
        <div class="product__name">Subscribe to Hagurash</div>
        <div class="product__amount">
          <h1>$20</h1>
          <div>
            <span>per <br />
              month</span>
          </div>
        </div>
      </div>
      <div class="footer">
        <p class="footer__logo">Hagurash</p>
        <div class="legal">
          <a href="../legal/terms.php" target="_blank">Terms |</a>
          <a href="../legal/privacy.php" target="_blank">Privacy</a>
        </div>
      </div>
    </div>
    <div class="payment__form">
      <button class="pay__btn">
        <a href="telebirr.com" class="pay__link">Pay with <span class="tele">telebirr</span>
          <svg class="InlineSVG LinkButton-arrow" focusable="false" width="25" height="18" viewBox="0 0 21 14" fill="none">
            <path class="Path--fill" d="M14.5247 0.219442C14.2317 -0.0733252 13.7568 -0.0731212 13.4641 0.219898C13.1713 0.512917 13.1715 0.98779 13.4645 1.28056L18.5 6.5L19 7L18.5 7.75C18 8.5 13.4645 12.7194 13.4645 12.7194C13.1715 13.0122 13.1713 13.4871 13.4641 13.7801C13.7568 14.0731 14.2317 14.0733 14.5247 13.7806L20.7801 7.53056C20.9209 7.38989 21 7.19902 21 7C21 6.80098 20.9209 6.61011 20.7801 6.46944L14.5247 0.219442Z" fill="#1D3944"></path>
            <path class="Path--stroke" d="M14 4L4 4" stroke="#1D3944" stroke-width="1.5" stroke-linecap="round"></path>
            <path class="Path--stroke" d="M14 4V1" stroke="#1D3944" stroke-width="1.5" stroke-linecap="round"></path>
            <path class="Path--stroke" d="M14 13V10" stroke="#1D3944" stroke-width="1.5" stroke-linecap="round"></path>
            <path class="Path--fill" d="M4 9.25C3.58579 9.25 3.25 9.58579 3.25 10C3.25 10.4142 3.58579 10.75 4 10.75V9.25ZM14 9.25H4V10.75H14V9.25Z" fill="#1D3944"></path>
            <path class="Path--fill" d="M1.00007 6.25C0.585853 6.24996 0.250037 6.58572 0.25 6.99993C0.249963 7.41415 0.58572 7.74996 0.999934 7.75L1.00007 6.25ZM14.0001 6.25115L1.00007 6.25L0.999934 7.75L13.9999 7.75115L14.0001 6.25115Z" fill="#1D3944"></path>
          </svg>
        </a>
      </button>
      <div class="divider">
        <hr />
        <span class="text__divider">Or pay with card</span>
      </div>
      <form novalidate action="">
        <div class="email">
          <p>Email</p>
          <p class="user_email"><?php echo $email ?></p>
        </div>
        <div class="card">
          <div class="card_field">
            <div class="label">
              <p class="label__name">Card information</p>
            </div>
            <div class="card__num">
              <div class="card__num__input input__field">
                <input type="text" name="card-num" placeholder="1234  1234  1234  1234" maxlength="22" class="card-num-input" required />
              </div>
              <div class="card__icons">
                <div class="visa">
                  <img src="https://js.stripe.com/v3/fingerprinted/img/visa-729c05c240c4bdb47b03ac81d9945bfe.svg" alt="visa-card image" />
                </div>
                <div class="master">
                  <img src="https://js.stripe.com/v3/fingerprinted/img/mastercard-4d8844094130711885b5e41b28c9848f.svg" alt="master-card" />
                </div>
                <div class="american-express">
                  <img src="https://js.stripe.com/v3/fingerprinted/img/amex-a49b82f46c5cd6a96a6e418a6ca1717c.svg" alt="american-express image" />
                </div>
                <div class="union">
                  <img src="https://js.stripe.com/v3/fingerprinted/img/unionpay-8a10aefc7295216c338ba4e1224627a1.svg" alt="union-pay img" />
                </div>
              </div>
            </div>
            <div class="card__details">
              <div class="card__expiration__date input__field">
                <input type="datetime" placeholder="MM / YY" name="expire-date" class="date__input" maxlength="7" required />
              </div>
              <div class="cvc input__field">
                <input type="text" class="cvc__input" name="cvc" placeholder="CVC" maxlength="4" />
              </div>
            </div>
          </div>

          <div class="card_field card__holder">
            <div class="label">
              <p class="label__name">Cardholder name</p>
            </div>
            <div class="card__holder__input">
              <input type="text" name="holder-name" placeholder="Full name on card" />
            </div>
          </div>
          <div class="card_field country">
            <div class="label">
              <p class="label__name">Country or region</p>
            </div>
            <div class="country__input input__field">
              <select name="country" id="">
                <option value="placeholder">Select country</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">
                  Antigua and Barbuda
                </option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">
                  Bosnia and Herzegovina
                </option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">
                  British Indian Ocean Territory
                </option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">
                  Central African Republic
                </option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">
                  Cocos (Keeling) Islands
                </option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">
                  Congo, The Democratic Republic of The
                </option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">
                  Falkland Islands (Malvinas)
                </option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">
                  French Southern Territories
                </option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">
                  Heard Island and Mcdonald Islands
                </option>
                <option value="Holy See (Vatican City State)">
                  Holy See (Vatican City State)
                </option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">
                  Iran, Islamic Republic of
                </option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">
                  Korea, Democratic People's Republic of
                </option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">
                  Lao People's Democratic Republic
                </option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">
                  Libyan Arab Jamahiriya
                </option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">
                  Macedonia, The Former Yugoslav Republic of
                </option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">
                  Micronesia, Federated States of
                </option>
                <option value="Moldova, Republic of">
                  Moldova, Republic of
                </option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">
                  Netherlands Antilles
                </option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">
                  Northern Mariana Islands
                </option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">
                  Palestinian Territory, Occupied
                </option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">
                  Saint Kitts and Nevis
                </option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">
                  Saint Pierre and Miquelon
                </option>
                <option value="Saint Vincent and The Grenadines">
                  Saint Vincent and The Grenadines
                </option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">
                  Sao Tome and Principe
                </option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">
                  South Georgia and The South Sandwich Islands
                </option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">
                  Svalbard and Jan Mayen
                </option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">
                  Syrian Arab Republic
                </option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">
                  Tanzania, United Republic of
                </option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">
                  Trinidad and Tobago
                </option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">
                  Turks and Caicos Islands
                </option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">
                  United Arab Emirates
                </option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">
                  United States Minor Outlying Islands
                </option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">
                  Virgin Islands, British
                </option>
                <option value="Virgin Islands, U.S.">
                  Virgin Islands, U.S.
                </option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
              </select>
            </div>
          </div>
          <div class="subscribe__btn">
            <button class="sub__btn" type="submit">Subscribe</button>
          </div>
          <div class="message__container">
            <p class="message">
              By confirming your subscription, you allow Hagurash LLC to
              charge you for future payments in accordance with our terms. You
              can always cancel your subscription.
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html>