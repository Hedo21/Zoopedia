<?php
function potong_artikel($teks, $jml_karakter)
{
    return substr($teks, 0, $jml_karakter);
}