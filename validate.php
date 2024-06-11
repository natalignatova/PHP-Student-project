<?php
	// Функция для безопасной обработки всех данных
function test_data($data) {
    return trim(stripslashes(htmlspecialchars($data)));
};
// Проверка email
function checkEmail($mail)
{
    if (gettype($mail) == "string") {   
        if (substr_count($mail, "@") === 1) {
            return  true;
        } 
    } 
    return false;    
}

//Функция проверки isikukood
function checkIsik($kood)
{
    if (gettype($kood) == "string") { 
        if(strlen($kood) == 11){
            if (in_array(substr($kood, 0, 1), ['3','4','5','6'])){
                if((int)$kood > 30001010000){
                    return true;
                } 
            } 
        }
    }
    return false;  
}
//Функция преобразования lastname, firstname, email
function convertString($string)
{
    if (substr_count($string, "@") === 1) {
        return strtolower($string);
    } 
	return mb_convert_case(mb_strtolower($string),MB_CASE_TITLE, "UTF-8");

};
?>