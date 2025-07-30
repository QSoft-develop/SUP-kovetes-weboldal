<?php

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

function qsGetLine($aFileName, $aID, $aIdx)
{
  $lFile = fopen($aFileName, "r") or die("Az $aFileName llomnyt nem lehet megnyitni!");
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

function qsGetDate($aFileName, $aID)
{
  return qsGetLine($aFileName, $aID, 2);
}

function qsGetVersion($aFileName, $aID)
{
  return qsGetLine($aFileName, $aID, 1);
}

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

function qsGetFileSize($aFileName)
{
  return resize_bytes(filesize($aFileName));
}

?>
