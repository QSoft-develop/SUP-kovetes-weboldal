<?php

// Egy adott sor adott indexű elemének visszaadása
function qsGetIndex($aSor, $aIdx)
{
  $lSeparator = ";";
  $lIdx = 0;
  $lWord = strtok($aSor, $lSeparator);
  while ( is_string($lWord) )
  {
    if ($lWord) {
      if ($lIdx == $aIdx)
      {
        return $lWord;
      }
    }
    $lWord = strtok($lSeparator);
    $lIdx++;
  }
  return "";
}

// Egy verzió fájl adott sorából az indexelt adat kiolvasása
function qsGetLine($aFileName, $aID, $aIdx)
{
  $lFile = fopen($aFileName, "r") or die("Az $aFileName állományt nem lehet megnyitni!");
  while (!feof($lFile))
  {
    $lSor = fgets($lFile, 1024);
    if (qsGetIndex($lSor, 0) == $aID)
    {
      fclose($lFile);
      return qsGetIndex($lSor, $aIdx);
    }
  }
  fclose($lFile);
  return "";
}

// A modul feltöltési dátumának lekérdezése
function qsGetDate($aFileName, $aID)
{
  return rtrim(qsGetLine($aFileName, $aID, 2));
}

// A modul verziószámának lekérdezése
function qsGetVersion($aFileName, $aID)
{
  return qsGetLine($aFileName, $aID, 1);
}

// Fájlméret átalakítása emberi olvasású formátumba
function resize_bytes($size)
{
   $count = 0;
   $format = array("B","KB","MB","GB","TB","PB","EB","ZB","YB");
   while(($size/1024)>1 && $count<8)
   {
       $size=$size/1024;
       $count++;
   }
   $return = number_format($size,2,'.','.')." ".$format[$count];
   return $return;
}

// A megadott fájl méretének lekérése formázva
function qsGetFileSize($aFileName)
{
  if (file_exists($aFileName))
  {return resize_bytes(filesize($aFileName));}
  else
  {return '<N/A>';}
}

?>
