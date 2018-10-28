<?php // display the admin options page
// http://ottopress.com/2009/wordpress-settings-api-tutorial/

/**
Affichage de la page des Options
*/
function theme_options_page() { 
?> 
<div>
    <h1>Options du thème</h1>
    <form action="options.php" method="post">
    <?php settings_fields('theme_options'); // sécurisation de la transaction ?>
    <?php do_settings_sections('options_theme'); // section des champs input ?>
    
    <input name="Submit" type="submit" value="<?php esc_attr_e('Enregistrer'); ?>" />
    </form>
</div>
<?php 
}

/**
Affichage de la section
 */
function options_section_text() {
    echo '<p>Les goûts et couleurs, prenez votre décision ici <a href="https://www.w3schools.com/w3css/w3css_color_themes.asp" target="_blank">W3.CSS</a></p>';
}

/**
Saisie du champ theme_w3css
*/
function pbi_setting_theme_w3css() {
    $themes = array('indigo','dark-grey','brown','blue-grey','deep-purple','blue'
    ,'teal','red','deep-orange','pink','light-blue','green','purple','cyan'
    ,'light-green','lime','khaki','yellow','amber','orange','grey','black','w3school');
    $options = get_option('theme_options');
    echo '<select id="theme-w3css" name="theme_options[theme-w3css]">';
    foreach ($themes as $theme) {
        echo '<option value="'.$theme.'"'
        .($theme==$options["theme-w3css"] ? " selected" : "")
        .'>'.$theme.'</option>';
    }
    // echo "<input id='theme-w3css' name='theme_options[theme-w3css]' size='40' type='text' value='{$options['theme-w3css']}' />";
}

/**
Validation du champ de saisie
*/
function theme_options_validate($input) {
    $options = get_option('theme_options');
    $options['theme-w3css'] = trim($input['theme-w3css']);
    // if (!preg_match('/^[a-z\-]{32}$/i', $options['theme-w3css']) ) {
    //     $options['theme-w3css'] = '';
    // }
    return $options;
}
