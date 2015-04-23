<div class="row">
    <div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">
        <div class="content-holder">
        <!-- language -->
        <div class="mylang">
            <ul class="lang">
                <?php foreach ($language as $keylang=>$lang) { ?>
                <li class="language">
                    <a href="javascript:void(0)" onclick="setLang(<?php echo $lang->id_language; ?>);">
                        <img src="<?php echo  Yii::app()->baseUrl; ?>/images/language/<?php echo $lang->image;?>" width="26">
                        <?php echo $lang->name; ?>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- content -->
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo $heding_title;?></h2>
                <?php echo $welcome_text;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="box-info"> 
                    <?php echo Yii::t('Personaldata','label_text');?>
                </div>
            </div>
        </div>
        <!-- form -->
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'customer-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
        )); ?>
        <?php if(Yii::app()->user->hasFlash('frontend-form')):?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::app()->user->getFlash('frontend-form'); ?>
            </div>
        <?php endif; ?>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <?php echo $form->labelEx($model,'name',array('class'=>'standart-label')); ?>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>300,'class'=>'form-control','required'=>'required')); ?>
                        <?php echo $form->error($model,'name'); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <?php echo $form->labelEx($model,'address',array('class'=>'standart-label')); ?>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>300,'class'=>'form-control','required'=>'required')); ?>
                        <?php echo $form->error($model,'address'); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <?php echo $form->labelEx($model,'contact',array('class'=>'standart-label')); ?>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <?php echo $form->textField($model,'contact',array('size'=>50,'maxlength'=>50,'class'=>'form-control','required'=>'required','id'=>'contact')); ?>
                        <?php echo $form->error($model,'contact'); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <?php echo $form->labelEx($model,'nationality',array('class'=>'standart-label')); ?>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <?php //echo $form->textField($model,'nationality',array('size'=>60,'maxlength'=>300,'class'=>'form-control','required'=>'required')); ?>
                        <?php 
                        $country=array(
                            "Aaland Islands"=>"Aaland Islands",
                            "Afghanistan"=>"Afghanistan",
                            "Albania"=>"Albania",
                            "Algeria"=>"Algeria",
                            "American Samoa"=>"American Samoa",
                            "Andorra"=>"Andorra",
                            "Angola"=>"Angola",
                            "Anguilla"=>"Anguilla",
                            "Antarctica"=>"Antarctica",
                            "Antigua and Barbuda"=>"Antigua and Barbuda",
                            "Argentina"=>"Argentina",
                            "Armenia"=>"Armenia",
                            "Aruba"=>"Aruba",
                            "Ascension Island (British)"=>"Ascension Island (British)",
                            "Australia"=>"Australia",
                            "Austria"=>"Austria",
                            "Azerbaijan"=>"Azerbaijan",
                            "Bahamas"=>"Bahamas",
                            "Bahrain"=>"Bahrain",
                            "Bangladesh"=>"Bangladesh",
                            "Barbados"=>"Barbados",
                            "Belarus"=>"Belarus",
                            "Belgium"=>"Belgium",
                            "Belize"=>"Belize",
                            "Benin"=>"Benin",
                            "Bermuda"=>"Bermuda",
                            "Bhutan"=>"Bhutan",
                            "Bolivia"=>"Bolivia",
                            "Bonaire, Sint Eustatius and Saba"=>"Bonaire, Sint Eustatius and Saba",
                            "Bosnia and Herzegovina"=>"Bosnia and Herzegovina",
                            "Botswana"=>"Botswana",
                            "Bouvet Island"=>"Bouvet Island",
                            "Brazil"=>"Brazil",
                            "British Indian Ocean Territory"=>"British Indian Ocean Territory",
                            "Brunei Darussalam"=>"Brunei Darussalam",
                            "Bulgaria"=>"Bulgaria",
                            "Burkina Faso"=>"Burkina Faso",
                            "Burundi"=>"Burundi",
                            "Cambodia"=>"Cambodia",
                            "Cameroon"=>"Cameroon",
                            "Canada"=>"Canada",
                            "Canary Islands"=>"Canary Islands",
                            "Cape Verde"=>"Cape Verde",
                            "Cayman Islands"=>"Cayman Islands",
                            "Central African Republic"=>"Central African Republic",
                            "Chad"=>"Chad",
                            "Chile"=>"Chile",
                            "China"=>"China",
                            "Christmas Island"=>"Christmas Island",
                            "Cocos (Keeling) Islands"=>"Cocos (Keeling) Islands",
                            "Colombia"=>"Colombia",
                            "Comoros"=>"Comoros",
                            "Congo"=>"Congo",
                            "Cook Islands"=>"Cook Islands",
                            "Costa Rica"=>"Costa Rica",
                            "Cote D'Ivoire"=>"Cote D'Ivoire",
                            "Croatia"=>"Croatia",
                            "Cuba"=>"Cuba",
                            "Curacao"=>"Curacao",
                            "Cyprus"=>"Cyprus",
                            "Czech Republic"=>"Czech Republic",
                            "Democratic Republic of Congo"=>"Democratic Republic of Congo",
                            "Denmark"=>"Denmark",
                            "Djibouti"=>"Djibouti",
                            "Dominica"=>"Dominica",
                            "Dominican Republic"=>"Dominican Republic",
                            "East Timor"=>"East Timor",
                            "Ecuador"=>"Ecuador",
                            "Egypt"=>"Egypt",
                            "El Salvador"=>"El Salvador",
                            "Equatorial Guinea"=>"Equatorial Guinea",
                            "Eritrea"=>"Eritrea",
                            "Estonia"=>"Estonia",
                            "Ethiopia"=>"Ethiopia",
                            "Falkland Islands (Malvinas)"=>"Falkland Islands (Malvinas)",
                            "Faroe Islands"=>"Faroe Islands",
                            "Fiji"=>"Fiji",
                            "Finland"=>"Finland",
                            "France, Metropolitan"=>"France, Metropolitan",
                            "French Guiana"=>"French Guiana",
                            "French Polynesia"=>"French Polynesia",
                            "French Southern Territories"=>"French Southern Territories",
                            "FYROM"=>"FYROM",
                            "Gabon"=>"Gabon",
                            "Gambia"=>"Gambia",
                            "Georgia"=>"Georgia",
                            "Germany"=>"Germany",
                            "Ghana"=>"Ghana",
                            "Gibraltar"=>"Gibraltar",
                            "Greece"=>"Greece",
                            "Greenland"=>"Greenland",
                            "Grenada"=>"Grenada",
                            "Guadeloupe"=>"Guadeloupe",
                            "Guam"=>"Guam",
                            "Guatemala"=>"Guatemala",
                            "Guernsey"=>"Guernsey",
                            "Guinea"=>"Guinea",
                            "Guinea-Bissau"=>"Guinea-Bissau",
                            "Guyana"=>"Guyana",
                            "Haiti"=>"Haiti",
                            "Heard and Mc Donald Islands"=>"Heard and Mc Donald Islands",
                            "Honduras"=>"Honduras",
                            "Hong Kong"=>"Hong Kong",
                            "Hungary"=>"Hungary",
                            "Iceland"=>"Iceland",
                            "India"=>"India",
                            "Indonesia"=>"Indonesia",
                            "Iran (Islamic Republic of)"=>"Iran (Islamic Republic of)",
                            "Iraq"=>"Iraq",
                            "Ireland"=>"Ireland",
                            "Isle of Man"=>"Isle of Man",
                            "Israel"=>"Israel",
                            "Italy"=>"Italy",
                            "Jamaica"=>"Jamaica",
                            "Japan"=>"Japan",
                            "Jersey"=>"Jersey",
                            "Jordan"=>"Jordan",
                            "Kazakhstan"=>"Kazakhstan",
                            "Kenya"=>"Kenya",
                            "Kiribati"=>"Kiribati",
                            "Korea, Republic of"=>"Korea, Republic of",
                            "Kosovo, Republic of"=>"Kosovo, Republic of",
                            "Kuwait"=>"Kuwait",
                            "Kyrgyzstan"=>"Kyrgyzstan",
                            "Lao People's Democratic Republic"=>"Lao People's Democratic Republic",
                            "Latvia"=>"Latvia",
                            "Lebanon"=>"Lebanon",
                            "Lesotho"=>"Lesotho",
                            "Liberia"=>"Liberia",
                            "Libyan Arab Jamahiriya"=>"Libyan Arab Jamahiriya",
                            "Liechtenstein"=>"Liechtenstein",
                            "Lithuania"=>"Lithuania",
                            "Luxembourg"=>"Luxembourg",
                            "Macau"=>"Macau",
                            "Madagascar"=>"Madagascar",
                            "Malawi"=>"Malawi",
                            "Malaysia"=>"Malaysia",
                            "Maldives"=>"Maldives",
                            "Mali"=>"Mali",
                            "Malta"=>"Malta",
                            "Marshall Islands"=>"Marshall Islands",
                            "Martinique"=>"Martinique",
                            "Mauritania"=>"Mauritania",
                            "Mauritius"=>"Mauritius",
                            "Mayotte"=>"Mayotte",
                            "Mexico"=>"Mexico",
                            "Micronesia, Federated States of"=>"Micronesia, Federated States of",
                            "Moldova, Republic of"=>"Moldova, Republic of",
                            "Monaco"=>"Monaco",
                            "Mongolia"=>"Mongolia",
                            "Montenegro"=>"Montenegro",
                            "Montserrat"=>"Montserrat",
                            "Morocco"=>"Morocco",
                            "Mozambique"=>"Mozambique",
                            "Myanmar"=>"Myanmar",
                            "Namibia"=>"Namibia",
                            "Nauru"=>"Nauru",
                            "Nepal"=>"Nepal",
                            "Netherlands"=>"Netherlands",
                            "Netherlands Antilles"=>"Netherlands Antilles",
                            "New Caledonia"=>"New Caledonia",
                            "New Zealand"=>"New Zealand",
                            "Nicaragua"=>"Nicaragua",
                            "Niger"=>"Niger",
                            "Nigeria"=>"Nigeria",
                            "Niue"=>"Niue",
                            "Norfolk Island"=>"Norfolk Island",
                            "North Korea"=>"North Korea",
                            "Northern Mariana Islands"=>"Northern Mariana Islands",
                            "Norway"=>"Norway",
                            "Oman"=>"Oman",
                            "Pakistan"=>"Pakistan",
                            "Palau"=>"Palau",
                            "Palestinian Territory, Occupied"=>"Palestinian Territory, Occupied",
                            "Panama"=>"Panama",
                            "Papua New Guinea"=>"Papua New Guinea",
                            "Paraguay"=>"Paraguay",
                            "Peru"=>"Peru",
                            "Philippines"=>"Philippines",
                            "Pitcairn"=>"Pitcairn",
                            "Poland"=>"Poland",
                            "Portugal"=>"Portugal",
                            "Puerto Rico"=>"Puerto Rico",
                            "Qatar"=>"Qatar",
                            "Reunion"=>"Reunion",
                            "Romania"=>"Romania",
                            "Russian Federation"=>"Russian Federation",
                            "Rwanda"=>"Rwanda",
                            "Saint Kitts and Nevis"=>"Saint Kitts and Nevis",
                            "Saint Lucia"=>"Saint Lucia",
                            "Saint Vincent and the Grenadines"=>"Saint Vincent and the Grenadines",
                            "Samoa"=>"Samoa",
                            "San Marino"=>"San Marino",
                            "Sao Tome and Principe"=>"Sao Tome and Principe",
                            "Saudi Arabia"=>"Saudi Arabia",
                            "Senegal"=>"Senegal",
                            "Serbia"=>"Serbia",
                            "Seychelles"=>"Seychelles",
                            "Sierra Leone"=>"Sierra Leone",
                            "Singapore"=>"Singapore",
                            "Slovak Republic"=>"Slovak Republic",
                            "Slovenia"=>"Slovenia",
                            "Solomon Islands"=>"Solomon Islands",
                            "Somalia"=>"Somalia",
                            "South Africa"=>"South Africa",
                            "South Georgia & South Sandwich Islands"=>"South Georgia & South Sandwich Islands",
                            "South Sudan"=>"South Sudan",
                            "Spain"=>"Spain",
                            "Sri Lanka"=>"Sri Lanka",
                            "St. Barthelemy"=>"St. Barthelemy",
                            "St. Helena"=>"St. Helena",
                            "St. Martin (French part)"=>"St. Martin (French part)",
                            "St. Pierre and Miquelon"=>"St. Pierre and Miquelon",
                            "Sudan"=>"Sudan",
                            "Suriname"=>"Suriname",
                            "Svalbard and Jan Mayen Islands"=>"Svalbard and Jan Mayen Islands",
                            "Swaziland"=>"Swaziland",
                            "Sweden"=>"Sweden",
                            "Switzerland"=>"Switzerland",
                            "Syrian Arab Republic"=>"Syrian Arab Republic",
                            "Taiwan"=>"Taiwan",
                            "Tajikistan"=>"Tajikistan",
                            "Tanzania, United Republic of"=>"Tanzania, United Republic of",
                            "Thailand"=>"Thailand",
                            "Togo"=>"Togo",
                            "Tokelau"=>"Tokelau",
                            "Tonga"=>"Tonga",
                            "Trinidad and Tobago"=>"Trinidad and Tobago",
                            "Tristan da Cunha"=>"Tristan da Cunha",
                            "Tunisia"=>"Tunisia",
                            "Turkey"=>"Turkey",
                            "Turkmenistan"=>"Turkmenistan",
                            "Turks and Caicos Islands"=>"Turks and Caicos Islands",
                            "Tuvalu"=>"Tuvalu",
                            "Uganda"=>"Uganda",
                            "Ukraine"=>"Ukraine",
                            "United Arab Emirates"=>"United Arab Emirates",
                            "United Kingdom"=>"United Kingdom",
                            "United States"=>"United States",
                            "United States Minor Outlying Islands"=>"United States Minor Outlying Islands",
                            "Uruguay"=>"Uruguay",
                            "Uzbekistan"=>"Uzbekistan",
                            "Vanuatu"=>"Vanuatu",
                            "Vatican City State (Holy See)"=>"Vatican City State (Holy See)",
                            "Venezuela"=>"Venezuela",
                            "Viet Nam"=>"Viet Nam",
                            "Virgin Islands (British)"=>"Virgin Islands (British)",
                            "Virgin Islands (U.S.)"=>"Virgin Islands (U.S.)",
                            "Wallis and Futuna Islands"=>"Wallis and Futuna Islands",
                            "Western Sahara"=>"Western Sahara",
                            "Yemen"=>"Yemen",
                            "Zambia"=>"Zambia",
                            "Zimbabwe"=>"Zimbabwe",
                        );
                        echo $form->dropDownList($model,'nationality',$country,array('empty'=>'Please Choose One','id'=>'nationality','class'=>'form-control','required'=>'required'));
                        ?>
                        <?php echo $form->error($model,'nationality'); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <?php echo $form->labelEx($model,'email',array('class'=>'standart-label')); ?>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'class'=>'form-control','required'=>'required')); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="button-holder">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Next' : 'Save', array('class'=>'btn btn-start')); ?>
                </div>
            </div>

        <?php $this->endWidget(); ?>
        <!-- form -->
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $("#contact").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>