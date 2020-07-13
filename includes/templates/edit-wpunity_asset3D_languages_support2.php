<?php

$asset_title_saved = ($asset_id == null ? "" : get_the_title( $asset_id ));
$asset_title_label = ($asset_id == null ? "Enter a title for the asset in English" : "Edit the title of the asset in English");

$asset_desc_label = ($asset_id == null ? "Add a description for the asset" : "Edit the description of the asset");
$asset_desc_saved = ($asset_id == null ? "" : get_post_field('post_content', $asset_id));
$asset_desc_kids_label = ($asset_id == null ? "Add a description of the asset for kids" : "Edit the description of the asset for kids");
$asset_desc_kids_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_kids', true));
$asset_desc_experts_label = ($asset_id == null ? "Add a description of the asset for experts in archaeology" : "Edit the description of the asset for experts in archaeology");
$asset_desc_experts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_experts', true));
$asset_desc_perception_label = ($asset_id == null ? "Add a description of the asset for people with perception problems" : "Edit the description of the asset for people with perception problems");
$asset_desc_perception_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_perception', true));

$asset_title_greek_label = ($asset_id == null ? "Ο τίτλος του αντικειμένου" : "Τροποποίηση τίτλου αντικειμένου");
$asset_title_greek_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_title_greek', true));
$asset_desc_greek_label = ($asset_id == null ? "Πρόσθεσε μια περιγραφή για το αντικείμενο" : "Τροποποίηση περιγραφής αντικειμένου");
$asset_desc_greek_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_greek', true));
$asset_desc_greek_kids_label = ($asset_id == null ? "Η περιγραφή του αντικειμένου για παιδιά" : "Τροποποίηση περιγραφής του αντικειμένου για παιδιά");
$asset_desc_greek_kids_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_greek_kids', true));
$asset_desc_greek_experts_label = ($asset_id == null ? "Η περιγραφή του αντικειμένου για ειδικούς στην αρχαιολογία" : "Τροποποίηση περιγραφής του αντικειμένου για ειδικούς στην αρχαιολογία");
$asset_desc_greek_experts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_greek_experts', true));
$asset_desc_greek_perception_label = ($asset_id == null ? "Η περιγραφή του αντικειμένου για άτομα με προβλήματατα αντίληψης" : "Τροποποίηση περιγραφής του αντικειμένου για άτομα με προβλήματατα αντίληψης");
$asset_desc_greek_perception_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_greek_perception', true));



$asset_title_spanish_label = ($asset_id == null ? "Ingrese un título para su activo" : "Edite el título del activo");
$asset_title_spanish_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_title_spanish', true));
$asset_desc_spanish_label = ($asset_id == null ? "Agregue una pequeña descripción para su activo" : "Edite la descripción de su activo");
$asset_desc_spanish_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_spanish', true));
$asset_desc_spanish_kids_label = ($asset_id == null ? "Agregue una descripción de su activo para niños" : "Editar la descripción del activo para niños");
$asset_desc_spanish_kids_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_spanish_kids', true));
$asset_desc_spanish_experts_label = ($asset_id == null ? "Agregar una descripción del activo para expertos en arqueología" : "Edite la descripción del activo para expertos en arqueología.");
$asset_desc_spanish_experts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_spanish_experts', true));
$asset_desc_spanish_perception_label = ($asset_id == null ? "Agregue una descripción del activo para personas con problemas de percepción" : "Edite la descripción del activo para personas con problemas de percepción");
$asset_desc_spanish_perception_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_spanish_perception', true));

$asset_title_french_label = ($asset_id == null ? "Entrez un titre pour votre bien" : "Modifier le titre de l'actif");
$asset_title_french_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_title_french', true));
$asset_desc_french_label = ($asset_id == null ? "Ajouter une description de votre actif" : "Modifier la description de votre bien");
$asset_desc_french_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_french', true));
$asset_desc_french_kids_label = ($asset_id == null ? "Ajouter une description pour votre bien pour enfants" : "Modifier la description de l'actif pour les enfants");
$asset_desc_french_kids_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_french_kids', true));
$asset_desc_french_experts_label = ($asset_id == null ? "Ajouter une description de l'actif pour les experts en archéologie" : "Modifier la description de l'actif pour les experts en archéologie");
$asset_desc_french_experts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_french_experts', true));
$asset_desc_french_perception_label = ($asset_id == null ? "Ajouter une description de l'actif pour les personnes ayant des problèmes de perception" : "Modifier la description de l'actif pour les personnes ayant des problèmes de perception");
$asset_desc_french_perception_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_french_perception', true));

$asset_title_german_label = ($asset_id == null ? "Geben Sie einen Titel für Ihr Asset ein" : "Bearbeiten Sie den Titel des Assets");
$asset_title_german_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_title_german', true));
$asset_desc_german_label = ($asset_id == null ? "Geben Sie eine Beschriebung" : "Ändern Sie die Beschreibung");
$asset_desc_german_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_german', true));
$asset_desc_german_kids_label = ($asset_id == null ? "Fügen Sie eine Beschreibung für Ihr Asset auf Englisch für Kinder hinzu" : "Bearbeiten Sie die Beschreibung des Assets für Kinder");
$asset_desc_german_kids_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_german_kids', true));
$asset_desc_german_experts_label = ($asset_id == null ? "Fügen Sie eine Beschreibung des Objekts für Experten der Archäologie hinzu" : "Bearbeiten Sie die Beschreibung des Assets für Experten in Archäologie");
$asset_desc_german_experts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_german_experts', true));
$asset_desc_german_perception_label = ($asset_id == null ? "Fügen Sie eine Beschreibung des Assets für Personen mit Wahrnehmungsproblemen hinzu" : "Bearbeiten Sie die Beschreibung des Assets für Personen mit Wahrnehmungsproblemen");
$asset_desc_german_perception_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_german_perception', true));

$asset_title_russian_label = ($asset_id == null ? "Введите название для вашего актива" : "Изменить заголовок актива");
$asset_title_russian_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_title_russian', true));
$asset_desc_russian_label = ($asset_id == null ? "Дать описание" : "Изменить описание");
$asset_desc_russian_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_russian', true));
$asset_desc_russian_kids_label = ($asset_id == null ? "Добавить описание для вашего имущества для детей" : "Редактировать описание актива для детей");
$asset_desc_russian_kids_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_russian_kids', true));
$asset_desc_russian_experts_label = ($asset_id == null ? "Добавить описание актива для специалистов по археологии" : "Редактировать описание актива для специалистов по археологии");
$asset_desc_russian_experts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_russian_experts', true));
$asset_desc_russian_perception_label = ($asset_id == null ? "Добавить описание актива для людей с проблемами восприятия" : "Изменить описание актива для людей с проблемами восприятия");
$asset_desc_russian_perception_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_russian_perception', true));

echo '<script>';
echo 'var asset_title_english_saved="'.$asset_title_saved.'";';
echo 'var asset_title_greek_saved="'.$asset_title_greek_saved.'";';
echo 'var asset_title_spanish_saved="'.$asset_title_spanish_saved.'";';
echo 'var asset_title_french_saved="'.$asset_title_french_saved.'";';
echo 'var asset_title_german_saved="'.$asset_title_german_saved.'";';
echo 'var asset_title_russian_saved="'.$asset_title_russian_saved.'";';
echo '</script>';

?>
