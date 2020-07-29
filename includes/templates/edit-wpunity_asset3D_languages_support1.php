<?php

$assetTitleForm = esc_attr(strip_tags($_POST['assetTitle'])); //Title of the Asset (Form value)
$assetTitleFormGreek = esc_attr(strip_tags($_POST['assetTitGreek'])); //Title of the Asset (Form value)
$assetTitleFormSpanish = esc_attr(strip_tags($_POST['assetTitSpanish'])); //Title of the Asset (Form value)
$assetTitleFormFrench = esc_attr(strip_tags($_POST['assetTitFrench'])); //Title of the Asset (Form value)
$assetTitleFormGerman = esc_attr(strip_tags($_POST['assetTitGerman'])); //Title of the Asset (Form value)
$assetTitleFormRussian = esc_attr(strip_tags($_POST['assetTitRussian'])); //Title of the Asset (Form value)


$assetDescForm = esc_attr(strip_tags($_POST['assetDesc'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormGreek = esc_attr(strip_tags($_POST['assetDescGreek'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormSpanish = esc_attr(strip_tags($_POST['assetDescSpanish'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormFrench = esc_attr(strip_tags($_POST['assetDescFrench'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormGerman = esc_attr(strip_tags($_POST['assetDescGerman'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormRussian = esc_attr(strip_tags($_POST['assetDescRussian'],"<b><i>")); //Description of the Asset (Form value)

$assetDescFormKids = esc_attr(strip_tags($_POST['assetDescKids'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormGreekKids = esc_attr(strip_tags($_POST['assetDescGreekKids'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormSpanishKids = esc_attr(strip_tags($_POST['assetDescSpanishKids'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormFrenchKids = esc_attr(strip_tags($_POST['assetDescFrenchKids'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormGermanKids = esc_attr(strip_tags($_POST['assetDescGermanKids'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormRussianKids = esc_attr(strip_tags($_POST['assetDescRussianKids'],"<b><i>")); //Description of the Asset (Form value)

$assetDescFormExperts = esc_attr(strip_tags($_POST['assetDescExperts'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormGreekExperts = esc_attr(strip_tags($_POST['assetDescGreekExperts'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormSpanishExperts = esc_attr(strip_tags($_POST['assetDescSpanishExperts'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormFrenchExperts = esc_attr(strip_tags($_POST['assetDescFrenchExperts'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormGermanExperts = esc_attr(strip_tags($_POST['assetDescGermanExperts'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormRussianExperts = esc_attr(strip_tags($_POST['assetDescRussianExperts'],"<b><i>")); //Description of the Asset (Form value)

$assetDescFormPerception = esc_attr(strip_tags($_POST['assetDescPerception'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormGreekPerception = esc_attr(strip_tags($_POST['assetDescGreekPerception'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormSpanishPerception = esc_attr(strip_tags($_POST['assetDescSpanishPerception'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormFrenchPerception = esc_attr(strip_tags($_POST['assetDescFrenchPerception'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormGermanPerception = esc_attr(strip_tags($_POST['assetDescGermanPerception'],"<b><i>")); //Description of the Asset (Form value)
$assetDescFormRussianPerception = esc_attr(strip_tags($_POST['assetDescRussianPerception'],"<b><i>")); //Description of the Asset (Form value)


if($assetDescFormGreek=='' && $assetDescForm !='' && $hasTranslator){
    $translate = new TranslateClient();
    $result = $translate->translate($assetDescForm, ['target' => 'el']);
    $assetDescFormGreek = $result[text];
}

if($assetDescFormSpanish=='' && $assetDescForm !='' && $hasTranslator){
    $translate = new TranslateClient();
    $result = $translate->translate($assetDescForm, ['target' => 'es']);
    $assetDescFormSpanish = $result[text];
}

if($assetDescFormFrench=='' && $assetDescForm !='' && $hasTranslator){
    $translate = new TranslateClient();
    $result = $translate->translate($assetDescForm, ['target' => 'fr']);
    $assetDescFormFrench = $result[text];
}

if($assetDescFormGerman=='' && $assetDescForm !='' && $hasTranslator){
    $translate = new TranslateClient();
    $result = $translate->translate($assetDescForm, ['target' => 'de']);
    $assetDescFormGerman = $result[text];
}

if($assetDescFormRussian=='' && $assetDescForm !='' && $hasTranslator){
    $translate = new TranslateClient();
    $result = $translate->translate($assetDescForm, ['target' => 'ru']);
    $assetDescFormRussian = $result[text];
}

$asset_language_pack = ['assetTitleForm'=>$assetTitleForm, 'assetDescForm'=>$assetDescForm, 'assetDescFormKids'=>$assetDescFormKids, 'assetDescFormExperts'=>$assetDescFormExperts, 'assetDescFormPerception'=>$assetDescFormPerception, 'assetTitleFormGreek'=>$assetTitleFormGreek, 'assetDescFormGreek'=>$assetDescFormGreek, 'assetDescFormGreekKids'=>$assetDescFormGreekKids, 'assetDescFormGreekExperts'=>$assetDescFormGreekExperts, 'assetDescFormGreekPerception'=>$assetDescFormGreekPerception,'assetTitleFormSpanish'=>$assetTitleFormSpanish, 'assetDescFormSpanish'=>$assetDescFormSpanish, 'assetDescFormSpanishKids'=>$assetDescFormSpanishKids, 'assetDescFormSpanishExperts'=>$assetDescFormSpanishExperts, 'assetDescFormSpanishPerception'=>$assetDescFormSpanishPerception, 'assetTitleFormFrench'=>$assetTitleFormFrench, 'assetDescFormFrench'=>$assetDescFormFrench, 'assetDescFormFrenchKids'=>$assetDescFormFrenchKids, 'assetDescFormFrenchExperts'=>$assetDescFormFrenchExperts, 'assetDescFormFrenchPerception'=>$assetDescFormFrenchPerception, 'assetTitleFormGerman'=>$assetTitleFormGerman, 'assetDescFormGerman'=> $assetDescFormGerman, 'assetDescFormGermanKids'=> $assetDescFormGermanKids, 'assetDescFormGermanExperts'=> $assetDescFormGermanExperts, 'assetDescFormGermanPerception'=> $assetDescFormGermanPerception, 'assetTitleFormRussian'=> $assetTitleFormRussian, 'assetDescFormRussian'=> $assetDescFormRussian, 'assetDescFormRussianKids'=> $assetDescFormRussianKids, 'assetDescFormRussianExperts'=> $assetDescFormRussianExperts, 'assetDescFormRussianPerception'=> $assetDescFormRussianPerception];
?>
