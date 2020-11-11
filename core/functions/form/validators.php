<?php

/**
 * Funkcija patikrina ar input'o laukelis nebuvo paliktas tuščias.
 *
 * Jeigu rasta tuščia vertė - input'o duomenų masyve 'error' indeksu įrašoma
 * kilusi klaida.
 * Funkcija klaidos atveju grąžina false, kitu - true.
 *
 * @param string $field_value išvalyto input'o vertė.
 * @param array $field vieno input'o duomenų masyvas.
 * @return bool
 */
function validate_field_not_empty(string $field_value, array &$field): bool{
    if ($field_value === '') {
        $field['error'] = 'empty input';
        return false;
    }

    return true;
}

/**
 * Function checks age - between 18 and 100
 *
 * @param int $field_value
 * @param array $field
 * @return bool
 */
function validate_age(int $field_value, array &$field): bool {
    if ($field_value < 18 || $field_value > 100) {
        $field['error'] = 'age has to be between 18 and 100';
        return false;
    }

    return true;
}

/**
 * Function checks whether there are 2 words provided
 *
 * @param string $field_value - input value
 * @param array $field - input array
 * @return bool
 */
function validate_full_name(string $field_value, array &$field): bool {
    if (str_word_count($field_value) < 2) {
        $field['error'] = 'name and surname have to be separate words';
        return false;
    }

    return true;
}

/**
 * Function checks number iput according to min and max parameters from the array
 *
 * @param int $field_value - input value
 * @param array $field - input array
 * @param array $params
 * @return bool
 */
function validate_field_range (int $field_value, array &$field, array $params): bool {
    if ($field_value < $params['min'] || $field_value > $params['max']) {
        $field['error'] = 'Number is not in range';
        return false;
    }

    return true;
}

///**
// * Function checks number to be between 50 and 100
// *
// * @param int $field_value - input value
// * @param array $field - input array
// * @return bool
// */
//function validate_field_num_50_100 (int $field_value, array &$field): bool {
//    if ($field_value < 50 || $field_value > 100) {
//        $field['error'] = 'Number has to be between 100 and 200';
//        return false;
//    }
//
//    return true;
//}

