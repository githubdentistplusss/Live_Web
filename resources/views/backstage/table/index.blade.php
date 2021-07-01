@extends('layouts.app') @section('title','statistics') @section('content')

<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-469750017 -1073732485 9 0 511 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	line-height:106%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
p.msonormal0, li.msonormal0, div.msonormal0
	{mso-style-name:msonormal;
	mso-style-unhide:no;
	mso-margin-top-alt:auto;
	margin-right:0in;
	mso-margin-bottom-alt:auto;
	margin-left:0in;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman",serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-size:10.0pt;
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
@page WordSection1
	{size:8.5in 11.0in;
	margin:1.0in 1.0in 1.0in 1.0in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.WordSection1
	{page:WordSection1;}
-->
</style>


<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"\062C\062F\0648\0644 \0639\0627\062F\064A";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
table.MsoTableGrid
	{mso-style-name:"\0634\0628\0643\0629 \062C\062F\0648\0644";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-priority:39;
	mso-style-unhide:no;
	border:solid windowtext 1.0pt;
	mso-border-alt:solid windowtext .5pt;
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-border-insideh:.5pt solid windowtext;
	mso-border-insidev:.5pt solid windowtext;
	mso-para-margin:0in;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
</style>

<div class="container">
    <br>
    <br>

    <div class="row">
      
      
      
      
      
      
      
      
      
      
      
      <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext 2.25pt;
 mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:
 2.25pt solid windowtext;mso-border-insidev:2.25pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=258 valign=top style='width:251.75pt;border:solid windowtext 2.25pt;
  background:#D0CECE;mso-background-themecolor:background2;mso-background-themeshade:
  230;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span dir=RTL></span><span lang=AR-SA
  dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
  mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
  Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$service}}</span><span
  style='font-size:22.0pt'><o:p></o:p></span></p>
  </td>
  <td width=211 valign=top style='width:215.75pt;border:solid windowtext 2.25pt;
  border-left:none;mso-border-left-alt:solid windowtext 2.25pt;background:#D0CECE;
  mso-background-themecolor:background2;mso-background-themeshade:230;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center dir=RTL style='margin-bottom:0in;margin-bottom:
  .0001pt;text-align:center;line-height:normal;direction:rtl;unicode-bidi:embed'><span
  lang=AR-SA style='font-size:22.0pt;font-family:"Times New Roman",serif;
  mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
  Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1582;&#1583;&#1605;&#1575;&#1578;</span><span
  dir=LTR style='font-size:22.0pt'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=258 valign=top style='width:251.75pt;border:solid windowtext 2.25pt;
  border-top:none;mso-border-top-alt:solid windowtext 2.25pt;background:#FFF2CC;
  mso-background-themecolor:accent4;mso-background-themetint:51;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span dir=RTL></span><span lang=AR-SA
  dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
  mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
  Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$hospital}}<o:p></o:p></span></p>
  </td>
  <td width=211 valign=top style='width:215.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 2.25pt;border-right:solid windowtext 2.25pt;
  mso-border-top-alt:solid windowtext 2.25pt;mso-border-left-alt:solid windowtext 2.25pt;
  background:#FFF2CC;mso-background-themecolor:accent4;mso-background-themetint:
  51;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
  style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1587;&#1578;&#1588;&#1601;&#1610;&#1575;&#1578;</span><span
  style='font-size:22.0pt'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td width=258 valign=top style='width:251.75pt;border:solid windowtext 2.25pt;
  border-top:none;mso-border-top-alt:solid windowtext 2.25pt;background:#E2EFD9;
  mso-background-themecolor:accent6;mso-background-themetint:51;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span dir=RTL></span><span lang=AR-SA
  dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
  mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
  Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$dentist}}</span><span
  style='font-size:22.0pt'><o:p></o:p></span></p>
  </td>
  <td width=211 rowspan=3 valign=top style='width:215.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 2.25pt;border-right:solid windowtext 2.25pt;
  mso-border-top-alt:solid windowtext 2.25pt;mso-border-left-alt:solid windowtext 2.25pt;
  background:#E2EFD9;mso-background-themecolor:accent6;mso-background-themetint:
  51;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
  style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1571;&#1591;&#1576;&#1575;&#1569;</span><span
  style='font-size:22.0pt'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3'>
  <td width=258 valign=top style='width:251.75pt;border:solid windowtext 2.25pt;
  border-top:none;mso-border-top-alt:solid windowtext 2.25pt;background:#E2EFD9;
  mso-background-themecolor:accent6;mso-background-themetint:51;padding:0in 5.4pt 0in 5.4pt'>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
   mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=85 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$dentistMale}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1584;&#1603;&#1585;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width=85 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$dentistFemale}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1571;&#1606;&#1579;&#1609;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2'>
    <td width=85 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$dentist1}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1587;&#1606;&#1577;
    &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;<span
    style='mso-spacerun:yes'>  </span>1</span><span style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3'>
    <td width=85 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$dentist2}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1587;&#1606;&#1577;
    &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;<span
    style='mso-spacerun:yes'>  </span>2</span><span style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:4'>
    <td width=85 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$dentist3}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1587;&#1606;&#1577;
    &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;<span
    style='mso-spacerun:yes'>  </span>3</span><span style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:5'>
    <td width=85 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$dentist4}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1587;&#1606;&#1577;
    &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;<span
    style='mso-spacerun:yes'>  </span>4</span><span style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:6'>
    <td width=85 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$dentist5}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1587;&#1606;&#1577;
    &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;<span
    style='mso-spacerun:yes'>  </span>5</span><span style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:7'>
    <td width=85 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$dentist6}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1587;&#1606;&#1577;
    &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;<span
    style='mso-spacerun:yes'>  </span>6</span><span style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:8;mso-yfti-lastrow:yes'>
    <td width=85 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$dentist7}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1587;&#1606;&#1607;
    &#1575;&#1604;&#1575;&#1605;&#1578;&#1610;&#1575;&#1586;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4'>
  <td width=258 valign=top style='width:251.75pt;border:solid windowtext 2.25pt;
  border-top:none;mso-border-top-alt:solid windowtext 2.25pt;background:#E2EFD9;
  mso-background-themecolor:accent6;mso-background-themetint:51;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:22.0pt'><o:p>&nbsp;</o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
   mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=86 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$eastern}}<o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center dir=RTL style='margin-bottom:0in;
    margin-bottom:.0001pt;text-align:center;line-height:normal;direction:rtl;
    unicode-bidi:embed'><span lang=AR-SA style='font-size:22.0pt;font-family:
    "Times New Roman",serif;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1588;&#1585;&#1602;&#1610;&#1577; </span><span dir=LTR
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width=86 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$Western}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1594;&#1585;&#1576;&#1610;&#1577;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2'>
    <td width=86 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>0</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1608;&#1587;&#1591;&#1609;</span><span style='font-size:
    22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3'>
    <td width=86 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>0</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1588;&#1605;&#1575;&#1604;&#1610;&#1577;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes'>
    <td width=86 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>0</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1580;&#1606;&#1608;&#1576;&#1610;&#1577;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:22.0pt'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5'>
  <td width=258 valign=top style='width:251.75pt;border:solid windowtext 2.25pt;
  border-top:none;mso-border-top-alt:solid windowtext 2.25pt;background:#FFCCCC;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span dir=RTL></span><span lang=AR-SA
  dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
  mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
  Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$user}}</span><span
  style='font-size:22.0pt'><o:p></o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
   mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=117 valign=top style='width:120.2pt;border:solid windowtext 1.0pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal'><span dir=RTL></span><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$usersSud}}<o:p></o:p></span></p>
    </td>
    <td width=127 valign=top style='width:120.25pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal'><span lang=AR-SA dir=RTL style='font-size:22.0pt;
    font-family:"Times New Roman",serif;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin;mso-bidi-font-family:"Times New Roman";mso-bidi-theme-font:
    minor-bidi'>&#1587;&#1593;&#1608;&#1583;&#1610;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
    <td width=117 valign=top style='width:120.2pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal'><span dir=RTL></span><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$usersnotSud}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=127 valign=top style='width:120.25pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal'><span lang=AR-SA dir=RTL style='font-size:22.0pt;
    font-family:"Times New Roman",serif;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin;mso-bidi-font-family:"Times New Roman";mso-bidi-theme-font:
    minor-bidi'>&#1594;&#1610;&#1585; &#1587;&#1593;&#1608;&#1583;&#1610;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:22.0pt'><o:p>&nbsp;</o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
   mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=86 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$usersMale}}<o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1584;&#1603;&#1585;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width=86 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$usersFemale}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1571;&#1606;&#1579;&#1609;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2'>
    <td width=86 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$easternUser}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center dir=RTL style='margin-bottom:0in;
    margin-bottom:.0001pt;text-align:center;line-height:normal;direction:rtl;
    unicode-bidi:embed'><span lang=AR-SA style='font-size:22.0pt;font-family:
    "Times New Roman",serif;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1588;&#1585;&#1602;&#1610;&#1577; </span><span dir=LTR
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3'>
    <td width=86 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$WesternUser}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1594;&#1585;&#1576;&#1610;&#1577;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:4'>
    <td width=86 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>0</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1608;&#1587;&#1591;&#1609;</span><span style='font-size:
    22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:5'>
    <td width=86 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>0</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1588;&#1605;&#1575;&#1604;&#1610;&#1577;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:6;mso-yfti-lastrow:yes'>
    <td width=86 valign=top style='width:75.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>0</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=158 valign=top style='width:147.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1580;&#1606;&#1608;&#1576;&#1610;&#1577;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:22.0pt'><o:p></o:p></span></p>
  </td>
  <td width=211 valign=top style='width:215.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 2.25pt;border-right:solid windowtext 2.25pt;
  mso-border-top-alt:solid windowtext 2.25pt;mso-border-left-alt:solid windowtext 2.25pt;
  background:#FFCCCC;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
  style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1585;&#1590;&#1609;</span><span
  style='font-size:22.0pt'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:6'>
  <td width=258 valign=top style='width:251.75pt;border:solid windowtext 2.25pt;
  border-top:none;mso-border-top-alt:solid windowtext 2.25pt;background:#DEEAF6;
  mso-background-themecolor:accent1;mso-background-themetint:51;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span dir=RTL></span><span lang=AR-SA
  dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
  mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
  Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$event}}</span><span
  style='font-size:22.0pt'><o:p></o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
   mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=110 valign=top style='width:111.2pt;border:solid windowtext 1.0pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span style='font-size:22.0pt'>0</span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><o:p></o:p></span></p>
    </td>
    <td width=134 valign=top style='width:126.05pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center dir=RTL style='margin-bottom:0in;
    margin-bottom:.0001pt;text-align:center;line-height:normal;direction:rtl;
    unicode-bidi:embed'><span lang=AR-SA style='font-size:22.0pt;font-family:
    "Times New Roman",serif;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1588;&#1585;&#1602;&#1610;&#1577; </span><span dir=LTR
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width=110 valign=top style='width:111.2pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span style='font-size:22.0pt'>0<o:p></o:p></span></p>
    </td>
    <td width=134 valign=top style='width:126.05pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1594;&#1585;&#1576;&#1610;&#1577;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2'>
    <td width=110 valign=top style='width:111.2pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span style='font-size:22.0pt'>0<o:p></o:p></span></p>
    </td>
    <td width=134 valign=top style='width:126.05pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1608;&#1587;&#1591;&#1609;</span><span style='font-size:
    22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3'>
    <td width=110 valign=top style='width:111.2pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span style='font-size:22.0pt'>0<o:p></o:p></span></p>
    </td>
    <td width=134 valign=top style='width:126.05pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1588;&#1605;&#1575;&#1604;&#1610;&#1577;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes'>
    <td width=110 valign=top style='width:111.2pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>0</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=134 valign=top style='width:126.05pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1583;&#1610;&#1606;&#1577;
    &#1575;&#1604;&#1580;&#1606;&#1608;&#1576;&#1610;&#1577;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  </td>
  <td width=211 rowspan=2 valign=top style='width:215.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 2.25pt;border-right:solid windowtext 2.25pt;
  mso-border-top-alt:solid windowtext 2.25pt;mso-border-left-alt:solid windowtext 2.25pt;
  background:#DEEAF6;mso-background-themecolor:accent1;mso-background-themetint:
  51;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
  style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1608;&#1575;&#1593;&#1610;&#1583;
  </span><span style='font-size:22.0pt'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:7;mso-yfti-lastrow:yes'>
  <td width=258 valign=top style='width:251.75pt;border:solid windowtext 2.25pt;
  border-top:none;mso-border-top-alt:solid windowtext 2.25pt;background:#DEEAF6;
  mso-background-themecolor:accent1;mso-background-themetint:51;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:22.0pt'><o:p>&nbsp;</o:p></span></p>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
   mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width=108 valign=top style='width:111.25pt;border:solid windowtext 1.0pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$Available}}</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
    <td width=136 valign=top style='width:129.2pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1575;&#1604;&#1605;&#1608;&#1575;&#1593;&#1610;&#1583;
    &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577;</span><span
    style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width=108 valign=top style='width:111.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$pending}}<o:p></o:p></span></p>
    </td>
    <td width=136 valign=top style='width:129.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1605;&#1608;&#1575;&#1593;&#1610;&#1583;
    &#1575;&#1606;&#1578;&#1592;&#1575;&#1585;
    &#1575;&#1593;&#1578;&#1605;&#1575;&#1583;
    &#1575;&#1604;&#1591;&#1576;&#1610;&#1576;</span><span style='font-size:
    22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2'>
    <td width=108 valign=top style='width:111.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$waitDo}}<o:p></o:p></span></p>
    </td>
    <td width=136 valign=top style='width:129.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1605;&#1608;&#1575;&#1593;&#1610;&#1583;
    &#1605;&#1593;&#1578;&#1605;&#1583;&#1607;</span><span style='font-size:
    22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3'>
    <td width=108 valign=top style='width:111.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$DoneCl}}<o:p></o:p></span></p>
    </td>
    <td width=136 valign=top style='width:129.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1605;&#1608;&#1575;&#1593;&#1610;&#1583;
    &#1578;&#1571;&#1603;&#1610;&#1583; &#1581;&#1590;&#1608;&#1585;
    &#1575;&#1604;&#1605;&#1585;&#1610;&#1590;</span><span style='font-size:
    22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:4'>
    <td width=108 valign=top style='width:111.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$DonOr}}<o:p></o:p></span></p>
    </td>
    <td width=136 valign=top style='width:129.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1605;&#1608;&#1575;&#1593;&#1610;&#1583;
    &#1578;&#1587;&#1580;&#1610;&#1604;
    &#1575;&#1604;&#1608;&#1589;&#1608;&#1604; &#1605;&#1606;
    &#1575;&#1604;&#1591;&#1576;&#1610;&#1576;</span><span style='font-size:
    22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:5'>
    <td width=108 valign=top style='width:111.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$cancel}}<o:p></o:p></span></p>
    </td>
    <td width=136 valign=top style='width:129.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1605;&#1608;&#1575;&#1593;&#1610;&#1583;
    &#1605;&#1604;&#1594;&#1610;&#1577;</span><span style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:6'>
    <td width=108 valign=top style='width:111.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$upcoming}}<o:p></o:p></span></p>
    </td>
    <td width=136 valign=top style='width:129.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1605;&#1608;&#1575;&#1593;&#1610;&#1583;
    &#1602;&#1575;&#1583;&#1605;&#1577;</span><span style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:7;mso-yfti-lastrow:yes'>
    <td width=108 valign=top style='width:111.25pt;border:solid windowtext 1.0pt;
    border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span dir=RTL></span><span
    lang=AR-SA dir=RTL style='font-size:22.0pt;font-family:"Times New Roman",serif;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'><span dir=RTL></span>{{$prev}}<o:p></o:p></span></p>
    </td>
    <td width=136 valign=top style='width:129.2pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
    mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
    style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
    Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi'>&#1605;&#1608;&#1575;&#1593;&#1610;&#1583;
    &#1587;&#1575;&#1576;&#1602;&#1577;</span><span style='font-size:22.0pt'><o:p></o:p></span></p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=AR-SA dir=RTL
  style='font-size:22.0pt;font-family:"Times New Roman",serif;mso-ascii-font-family:
  Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;
  mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";
  mso-bidi-theme-font:minor-bidi'><o:p></o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><span style='font-size:22.0pt;line-height:106%'><o:p>&nbsp;</o:p></span></p>
      
      
      
      
      
      
      
      
      
      
      
    </div>
    

    
    
    
</div>

@endsection