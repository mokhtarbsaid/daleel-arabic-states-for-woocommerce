<?php

class Dall_Arst_Main {
    public function __construct() {
        add_filter( 'woocommerce_states', array( $this, 'add_arabic_countries_states' ) );
        load_plugin_textdomain('daleel-arabic-states-for-woocommerce', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }

    public function add_arabic_countries_states( $states ) {
        // Path to the countries folder
        $countries_path = DALL_ARST_PATH . 'includes/countries/';

        // List of Arab country files (add more as needed)
        $arab_countries = array(
            'AE' => 'ae.php',
            'BH' => 'bh.php',
            'DJ' => 'dj.php',
            'EG' => 'eg.php',
            'EH' => 'eh.php',
            'ER' => 'er.php',
            'IQ' => 'iq.php',
            'JO' => 'jo.php', 
            'KW' => 'kw.php',
            'LB' => 'lb.php',
            'LY' => 'ly.php', 
            'MA' => 'ma.php',
            'MR' => 'mr.php',
            'OM' => 'om.php',
            'PS' => 'ps.php',
            'QA' => 'qa.php',
            'SA' => 'sa.php', 
            'SD' => 'sd.php',
            'SO' => 'so.php',
            'SY' => 'sy.php',
            'TN' => 'tn.php',
            'YE' => 'ye.php',
            'KM' => 'km.php',
        );


        foreach ( $arab_countries as $code => $file ) {
            $file_path = $countries_path . $file;
            if ( file_exists( $file_path ) ) {
                $states[$code] = include $file_path;
            }
        }

        return $states;
    }

}
