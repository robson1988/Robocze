<?php
  session_start();

  include_once "../Classes/db.class.php";
  include_once "../Classes/checkSession.class.php";
  include_once "../Classes/userDetails.class.php";
  include_once "../Classes/showUserDetails.class.php";

  //Sprawdzenie czy sesja zalogowanego użytkownika istnieje i jaka jest rola użytkownika aby można było go przekierować do odpowiedniego panelu//
  $isLogedIn = new CheckSession;
  $isLogedIn->logedUser();

  //Załadowanie zapisanych danych użytkownika do zakładki "moje dane"
  $userData = new ShowUserDetails;
  $userData->viewUserDetails($_SESSION['user-id']);

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<title>Zamów dietę pudełkową | Catering dietetyczny Fitbox</title>
<meta name="description" content="Zamów dietę pudełkową dla siebie! Ciesz się zdrowiem i pięknym wyglądem bez spędzania długich godzin w kuchni. Catering dietetyczny Fitbox zaprasza!">
<meta name="keywords" content="catering dietetyczny, catering dietetyczny stalowa wola, zdrowe jedzenie, dieta z dowozem, dieta pudełkowa, dieta pudełkowa stalowa wola">
<meta name="author" content="Rbcode.pl">
<meta name="robots" content="noindex,nofollow">
<link rel="shortcut icon" href="Images/Favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="Images/Favicon/favicon.ico" type="image/x-icon">
<link rel="icon" type="image/png" sizes="32x32" href="Images/Favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="Images/Favicon/favicon-16x16.png">
<link rel="apple-touch-icon" sizes="57x57" href="Images/Favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="Images/Favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="Images/Favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="Images/Favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="Images/Favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="Images/Favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="Images/Favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="Images/Favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="Images/Favicon/apple-icon-180x180.png">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="Images/Favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!--Flashy -->
<link rel="stylesheet" type="text/css" href="css/flashy/flashy.min.css">
<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="css/bootstrap-css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="User-panel/style.css">
<!-- Fontawasome -->
<link href="css/fontawasome/css/all.min.css" rel="stylesheet">
<!-- Flatpickr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">

</head>
<body class="order-body">
<!--Container-->
<div class="container-fluid">
  <!--Header-->
  <div class="row m-0 order-header">
    <div class="col-12">
      <a href="https://www.fitbox.com.pl" title="Fitbox - strona główna"><img src="Images/Fitbox-dieta-pudełkowa-logo.png" class="order-logo" alt="Logo Fitbox - catering dietetyczny na zamówienie" title="Logo Fitbox"></a>
      <h1 class="order-heading">Zamów dietę dla siebie</h1>
    </div>
  </div>
  <!--=== Content ===-->
  <div class="row m-0 order-content pt-4">
    <div class="col-2 py-1 px-0 ">
      <div class="row mx-1 sticky-top">
      <div class="col-12 details">
        <ul class="nav flex-column nav-pills" id="myTab" role="tablist" aria-orientation="vertical">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-shopping-bag pr-2"></i>Zamów dietę</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user-alt pr-2"></i>Moje konto</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-calendar-alt pr-2"></i>Historia zamówień</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" href="logout"><i class="fas fa-sign-out-alt pr-2"></i>Wyloguj się</a>
          </li>
        </ul>
      </div>
     </div>
   </div>

   <!--=== Tab Content ===-->
   <div class="col-6 py-1 px-0 tab-content" id="myTabContent">

     <!--=== Tab Choose Diet ===-->
     <div class="row mx-1 diets tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="col-md-12 col-sm-12 mx-auto all-diets" id="start">
    		<div class="card mb-2">
    		  <div class="row m-0 no-gutters">

                <div class="row m-0 no-gutters">
                  <div class="col-md-3 col-sm-12 my-auto">
        		        <img src="Images/Dieta-premium.png" class="img-fluid" alt="Fitbox - Dieta pudełkowa premium" title="Dieta premium">
                  </div>
                  <div class="col-md-9 col-sm-12">
                    <div class="card-body">
                    <h3 class="card-title text-left">Dieta startowa na próbę</h3>
                    <p>Jednodniowa dieta skłądająca się z 5 posiłków o łącznej kaloryczności 1000 kcal. Wybierz typ diety i weź na próbę!</p>
                    <div class="form-row">
                      <div class="col-sm-12 col-md-2">
                        <label for="diet">Dieta<span class="red-star">*</span></label>
                        <select id="start_dieta" class="form-control" name="diet">
                          <option value="start-wegetarianska">wegetariańska</option>
                          <option value="start-klasyczna">klasyczna</option>
                          <option value="start-bez-ryb">bez ryb</option>
                       </select>
                     </div>
                     <div class="col-sm-12 col-md-2">
                      <label for="posilki">Ile posiłków<span class="red-star">*</span></label>
                      <select id="start_posilki" class="form-control" name="posilki">
                        <option value="5">5</option>
                      </select>
                     </div>
                     <div class="col-sm-12 col-md-2">
                      <label for="kcal">Kaloryczność<span class="red-star">*</span></label>
                      <select id="start_kcal" class="form-control" name="kcal">
                        <option value="1000">1000</option>
                      </select>
                     </div>
                     <div class="col-sm-12 col-md-2">
                      <label for="dni">Ile dni<span class="red-star">*</span></label>
                      <select id="start_dni" class="form-control" name="dni">
                        <option value="1">1</option>
                      </select>
                     </div>
                     <div class="col-12 mt-1">
                       <div class="slide-in">
            							<button onclick="cart('add','start')" title="Dodaj do koszyka" class="btn btn-zamow">Dodaj do koszyka</button>
            							<div class="slide-eff"></div>
          						 </div>
                     </div>
                    </div>
                  </div>
                </div>
    		      </div>
    		    </div>
    	  	</div>
       </div> <!--=== card end ===-->

       <div class="col-md-12 col-sm-12 mx-auto all-diets" id="klasyczna">
        <div class="card mb-2">
          <div class="row m-0 no-gutters">

                 <div class="row m-0 no-gutters">
                   <div class="col-md-3 col-sm-12 my-auto">
                    <img src="Images/Dieta-klasyczna.png" class="img-fluid" alt="Fitbox - Dieta pudełkowa premium" title="Dieta premium">
                   </div>
                   <div class="col-md-9 col-sm-12">
                     <div class="card-body">
                     <h3 class="card-title text-left">Dieta klasyczna</h3>
                     <p>Jednodniowa dieta skłądająca się z 5 posiłków o łącznej kaloryczności 1000 kcal. Wybierz typ diety i weź na próbę!</p>
                     <div class="form-row">
                       <input id="klasyczna_dieta" type="hidden" value="klasyczna"/>
                      <div class="col-sm-12 col-md-3">
                      <label for="posilki">Ile posiłków<span class="red-star">*</span></label>
                       <select id="klasyczna_posilki" class="form-control" name="posilki">
                         <option value="">Wybierz...</option>
                           <option value="5">5</option>
                           <option value="3">3</option>
                           <option value="1">1</option>
                       </select>
                      </div>
                      <div class="col-sm-12 col-md-2">
                        <label for="klasyczna">Kaloryczność<span class="red-star">*</span></label>
                        <div id="5-klasyczna-show" class="show-kcal">
                          <select id="klasyczna_kcal" class="form-control" name="klasyczna">
                          <option value="">Wybierz...</option>
                            <option value="2800">2800</option>
                            <option value="2500">2500</option>
                            <option value="2300">2300</option>
                            <option value="2200">2200</option>
                            <option value="2100">2100</option>
                            <option value="2000">2000</option>
                            <option value="1800">1800</option>
                            <option value="1700">1700</option>
                            <option value="1600">1600</option>
                            <option value="1500">1500</option>
                            <option value="1300">1300</option>
                            <option value="1200">1200</option>
                            <option value="1000">1000</option>
                          </select>
                        </div>
                        <div id="3-klasyczna-show" class="show-kcal">
                          <select id="klasyczna_kcal" class="form-control" name="klasyczna" >
                            <option value="">Wybierz...</option>
                            <option value="2500">2500</option>
                            <option value="2300">2300</option>
                            <option value="2000">2000</option>
                            <option value="1800">1800</option>
                            <option value="1700">1700</option>
                            <option value="1600">1600</option>
                            <option value="1500">1500</option>
                            <option value="1300">1300</option>
                            <option value="1200">1200</option>
                            <option value="1000">1000</option>
                          </select>
                       </div>
                      <div id="1-klasyczna-show" class="show-kcal">
                        <select id="klasyczna_kcal" class="form-control" name="klasyczna">
                          <option value="">Wybierz...</option>
                          <option value="850">850</option>
                          <option value="800">800</option>
                          <option value="750">750</option>
                          <option value="670">670</option>
                          <option value="650">650</option>
                          <option value="500">500</option>
                          <option value="450">450</option>
                          <option value="400">400</option>
                          <option value="350">350</option>
                        </select>
                     </div>
                   </div>
                      <div class="col-sm-12 col-md-2">
                       <label for="dni">Ile dni<span class="red-star">*</span></label>
                       <select id="klasyczna_dni" class="form-control" name="dni">
                         <option value="">Wybierz...</option>
                         <option value="30">30</option>
                         <option value="20">20</option>
                         <option value="15">15</option>
                         <option value="10">10</option>
                         <option value="5">5</option>
                         <option value="1">1</option>
                       </select>
                      </div>
                      <div class="col-12 mt-1">
                        <div class="slide-in">
                           <button onclick="cart('add','klasyczna')" title="Dodaj do koszyka" class="btn btn-zamow">Dodaj do koszyka</button>
                           <div class="slide-eff"></div>
                        </div>
                      </div>
                     </div>
                   </div>
                 </div>
              </div>
            </div>
          </div>
        </div> <!--=== card end ===-->

       <div class="col-md-12 col-sm-12 mx-auto all-diets" id="sokowa">
         <div class="card mb-2">
           <div class="row m-0 no-gutters">
             <div class="col-md-3 col-sm-3 my-auto">
               <img src="Images/Dieta-sokowa.png" class="img-fluid" alt="Fitbox - Dieta pudełkowa sokowa" title="Dieta sokowa">
             </div>
             <div class="col-md-9 col-sm-9">
               <div class="card-body">
                 <h3 class="card-title text-left">Dieta sokowa</h3>
                 <p>Świeżo wyciskane soki z warzyw i owoców są najlepszym sposobem na oczyszczenie organizmu z toksyn. Idealna dieta na poprawę funkcjonowania organizmu</p>
                 <div class="form-row">
                   <input id="sokowa_dieta" type="hidden" value="sokowa"/>
                  <div class="col-sm-12 col-md-3">
                  <label for="posilki">Ile posiłków<span class="red-star">*</span></label>
                   <select id="sokowa_posilki" class="form-control" name="posilki">
                     <option value="5">5 soków</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="kcal">Kaloryczność<span class="red-star">*</span></label>
                   <select id="sokowa_kcal" class="form-control" name="kcal">
                     <option value="800">800-950</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="dni">Ile dni<span class="red-star">*</span></label>
                   <select id="sokowa_dni" class="form-control" name="dni">
                     <option value="">Wybierz...</option>
                     <option value="5">5</option>
                     <option value="3">3</option>
                     <option value="1">1</option>
                   </select>
                  </div>
                  <div class="col-12 mt-1">
                    <div class="slide-in">
                       <button onclick="cart('add','sokowa')" title="Dodaj do koszyka" class="btn btn-zamow">Dodaj do koszyka</button>
                       <div class="slide-eff"></div>
                    </div>
                  </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div><!--=== card end ===-->


       <div class="col-md-12 col-sm-12 mx-auto all-diets" id="dla-mam">
         <div class="card mb-2">
           <div class="row m-0 no-gutters">
             <div class="col-md-3 col-sm-3 my-auto">
               <img src="Images/Dieta-dla-mam.png" class="img-fluid" alt="Fitbox - Dieta pudełkowa ciąża" title="Catering dietetyczny dla kobiet w ciąży">
             </div>
             <div class="col-md-9 col-sm-9">
               <div class="card-body">
                 <h3 class="card-title text-left">Dieta dla mam</h3>
                 <p>Dieta pudełkowa dla ciężarnych i dla matek karmiących. Dostarcza organizmowi składników odżywczych potrzebnych do prawidłowego rozwoju dziecka.</p>
                 <div class="form-row">
                   <input id="dla-mam_dieta" type="hidden" value="dla-mam"/>
                  <div class="col-sm-12 col-md-3">
                   <label for="posilki">Ile posiłków<span class="red-star">*</span></label>
                   <select id="dla-mam_posilki" class="form-control" name="posilki">
                     <option value="5">5</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                  <label for="kcal">Kaloryczność<span class="red-star">*</span></label>
                   <select id="dla-mam_kcal" class="form-control" name="kcal">
                   <option value="">Wybierz...</option>
                   <option value="2500">2500</option>
                   <option value="2300">2300</option>
                   <option value="2000">2000</option>
                   <option value="1800">1800</option>
                   <option value="1700">1700</option>
                   <option value="1600">1600</option>
                   <option value="1500">1500</option>
                   <option value="1300">1300</option>
                   <option value="1200">1200</option>
                   <option value="1000">1000</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="dni">Ile dni<span class="red-star">*</span></label>
                   <select id="dla-mam_dni" class="form-control" name="dni">
                     <option value="">Wybierz...</option>
                     <option value="30">30</option>
                     <option value="20">20</option>
                     <option value="15">15</option>
                     <option value="10">10</option>
                     <option value="5">5</option>
                     <option value="1">1</option>
                   </select>
                  </div>
                  <div class="col-12 mt-1">
                    <div class="slide-in">
                       <button onclick="cart('add','dla-mam')" title="Dodaj do koszyka" class="btn btn-zamow">Dodaj do koszyka</button>
                       <div class="slide-eff"></div>
                    </div>
                  </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div><!--=== card end ===-->

       <div class="col-md-12 col-sm-12 mx-auto all-diets" id="srodziemnomorska">
         <div class="card mb-2">
           <div class="row m-0 no-gutters">
             <div class="col-md-3 col-sm-3 my-auto">
               <img src="Images/Dieta-srodziemnomorska.png" class="img-fluid" alt="Fitbox - Dieta pudełkowa srodziemnomorska" title="Dieta pudełkowa Śródziemnomorska">
             </div>
             <div class="col-md-9 col-sm-9">
               <div class="card-body">
                 <h3 class="card-title text-left">Dieta śródziemnomorska</h3>
                 <p>Dieta śródziemnomorska inspirowana jest pokarmami spożywanymi przez mieszkańców terenów przybrzeżnych basenu Morza Śródziemnego.</p>
                 <div class="form-row">
                   <input id="srodziemnomorska_dieta" type="hidden" value="srodziemnomorska"/>
                  <div class="col-sm-12 col-md-3">
                   <label for="posilki">Ile posiłków<span class="red-star">*</span></label>
                   <select id="srodziemnomorska_posilki" class="form-control" name="posilki">
                     <option value="5">5</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="kcal">Kaloryczność<span class="red-star">*</span></label>
                   <select id="srodziemnomorska_kcal" class="form-control" name="kcal">
                   <option value="">Wybierz...</option>
                   <option value="2500">2500</option>
                   <option value="2300">2300</option>
                   <option value="2000">2000</option>
                   <option value="1800">1800</option>
                   <option value="1700">1700</option>
                   <option value="1600">1600</option>
                   <option value="1500">1500</option>
                   <option value="1300">1300</option>
                   <option value="1200">1200</option>
                   <option value="1000">1000</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="dni">Ile dni<span class="red-star">*</span></label>
                   <select id="srodziemnomorska_dni" class="form-control" name="dni">
                     <<option value="">Wybierz...</option>
                     <option value="30">30</option>
                     <option value="20">20</option>
                     <option value="15">15</option>
                     <option value="10">10</option>
                     <option value="5">5</option>
                     <option value="1">1</option>
                   </select>
                  </div>
                  <div class="col-12 mt-1">
                    <div class="slide-in">
                       <button onclick="cart('add','srodziemnomorska')" title="Dodaj do koszyka" class="btn btn-zamow">Dodaj do koszyka</button>
                       <div class="slide-eff"></div>
                    </div>
                  </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div><!--=== card end ===-->

       <div class="col-md-12 col-sm-12 mx-auto all-diets" id="cukrzykow">
         <div class="card mb-2">
           <div class="row m-0 no-gutters">
             <div class="col-md-3 col-sm-3 my-auto">
               <img src="Images/Dieta-dla-cukrzyków.png" class="img-fluid" alt="Fitbox - Dieta pudełkowa dla cukrzyków" title="Dieta pudełkowa dla cukrzyków">
             </div>
             <div class="col-md-9 col-sm-9">
               <div class="card-body">
                 <h3 class="card-title text-left">Dieta dla cukrzyków</h3>
                 <p>Dieta dla cukrzyków to jeden z podstawowych sposobów leczenia cukrzycy. Zdrowa dieta i odpowiedni styl życia mogą znacznie poprawić komfort życia cukrzyka.</p>
                 <div class="form-row">
                   <input id="cukrzykow_dieta" type="hidden" value="cukrzykow"/>
                  <div class="col-sm-12 col-md-3">
                   <label for="posilki">Ile posiłków<span class="red-star">*</span></label>
                   <select id="cukrzykow_posilki" class="form-control" name="posilki">
                     <option value="5">5</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="kcal">Kaloryczność<span class="red-star">*</span></label>
                   <select id="cukrzykow_kcal" class="form-control" name="kcal">
                   <option value="">Wybierz...</option>
                   <option value="2500">2500</option>
                   <option value="2300">2300</option>
                   <option value="2000">2000</option>
                   <option value="1800">1800</option>
                   <option value="1700">1700</option>
                   <option value="1600">1600</option>
                   <option value="1500">1500</option>
                   <option value="1300">1300</option>
                   <option value="1200">1200</option>
                   <option value="1000">1000</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="dni">Ile dni<span class="red-star">*</span></label>
                   <select id="cukrzykow_dni" class="form-control" name="dni">
                     <<option value="">Wybierz...</option>
                     <option value="30">30</option>
                     <option value="20">20</option>
                     <option value="15">15</option>
                     <option value="10">10</option>
                     <option value="5">5</option>
                     <option value="1">1</option>
                   </select>
                  </div>
                  <div class="col-12 mt-1">
                    <div class="slide-in">
                       <button onclick="cart('add','cukrzykow')" title="Dodaj do koszyka" class="btn btn-zamow">Dodaj do koszyka</button>
                       <div class="slide-eff"></div>
                    </div>
                  </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div><!--=== card end ===-->

       <div class="col-md-12 col-sm-12 mx-auto all-diets" id="ketogeniczna">
         <div class="card mb-2">
           <div class="row m-0 no-gutters">
             <div class="col-md-3 col-sm-3 my-auto">
               <img src="Images/Dieta-ketogeniczna.png" class="img-fluid" alt="Fitbox - Dieta pudełkowa klasyczna" title="Dieta pudełkowa klasyczna">
             </div>
             <div class="col-md-9 col-sm-9">
               <div class="card-body">
                 <h3 class="card-title text-left">Dieta ketogeniczna</h3>
                 <p>Dieta niskowęglowodanowa, któa wprowadza organizm w stan ketozy. Sprzyja to intenstywnemu spalaniu tłuszczy oraz leczeniu niektórych chorób.</p>
                 <div class="form-row">
                   <input id="ketogeniczna_dieta" type="hidden" value="ketogeniczna"/>
                  <div class="col-sm-12 col-md-3">
                   <label for="posilki">Ile posiłków<span class="red-star">*</span></label>
                   <select id="ketogeniczna_posilki" class="form-control" name="posilki">
                     <option value="3">3</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                  <label for="kcal">Kaloryczność<span class="red-star">*</span></label>
                   <select id="ketogeniczna_kcal" class="form-control" name="kcal">
                   <option value="">Wybierz...</option>
                   <option value="2500">2500</option>
                   <option value="2000">2000</option>
                   <option value="1800">1800</option>
                   <option value="1500">1500</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="dni">Ile dni<span class="red-star">*</span></label>
                   <select id="ketogeniczna_dni" class="form-control" name="dni">
                     <<option value="">Wybierz...</option>
                     <option value="30">30</option>
                     <option value="20">20</option>
                     <option value="15">15</option>
                     <option value="10">10</option>
                     <option value="5">5</option>
                     <option value="1">1</option>
                   </select>
                  </div>
                  <div class="col-12 mt-1">
                    <div class="slide-in">
                       <button onclick="cart('add','ketogeniczna')" title="Dodaj do koszyka" class="btn btn-zamow">Dodaj do koszyka</button>
                       <div class="slide-eff"></div>
                    </div>
                  </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div><!--=== card end ===-->

       <div class="col-md-12 col-sm-12 mx-auto all-diets" id="bezglutenowa">
         <div class="card mb-2">
           <div class="row m-0 no-gutters">
             <div class="col-md-3 col-sm-3 my-auto">
               <img src="Images/Dieta-bezglutenowa.png" class="img-fluid" alt="Fitbox - Dieta pudełkowa bezglutenowa" title="Dieta pudełkowa bezglutenowa">
             </div>
             <div class="col-md-9 col-sm-9">
               <div class="card-body">
                 <h3 class="card-title text-left">Dieta bezglutenowa</h3>
                 <p class="card-text">Dieta przeznaczona dla osób nie tolerujących glutenu. W diecie całkowicie eliminujemy z posiłków gluten pochodzenia naturalnego jak i ten z produktów przetworzonych.</p>
                 <div class="form-row">
                   <input id="bezglutenowa_dieta" type="hidden" value="bezglutenowa"/>
                  <div class="col-sm-12 col-md-3">
                   <label for="posilki">Ile posiłków<span class="red-star">*</span></label>
                   <select id="bezglutenowa_posilki" class="form-control" name="posilki">
                     <option value="5">5</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="kcal">Kaloryczność<span class="red-star">*</span></label>
                   <select id="bezglutenowa_kcal" class="form-control" name="kcal">
                   <option value="">Wybierz...</option>
                   <option value="2500">2500</option>
                   <option value="2300">2300</option>
                   <option value="2000">2000</option>
                   <option value="1800">1800</option>
                   <option value="1700">1700</option>
                   <option value="1600">1600</option>
                   <option value="1500">1500</option>
                   <option value="1300">1300</option>
                   <option value="1200">1200</option>
                   <option value="1000">1000</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="dni">Ile dni<span class="red-star">*</span></label>
                   <select id="bezglutenowa_dni" class="form-control" name="dni">
                     <<option value="">Wybierz...</option>
                     <option value="30">30</option>
                     <option value="20">20</option>
                     <option value="15">15</option>
                     <option value="10">10</option>
                     <option value="5">5</option>
                     <option value="1">1</option>
                   </select>
                  </div>
                  <div class="col-12 mt-1">
                    <div class="slide-in">
                       <button onclick="cart('add','bezglutenowa')" title="Dodaj do koszyka" class="btn btn-zamow">Dodaj do koszyka</button>
                       <div class="slide-eff"></div>
                    </div>
                  </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div><!--=== card end ===-->

       <div class="col-md-12 col-sm-12 mx-auto all-diets" id="hashimoto">
         <div class="card mb-2">
           <div class="row m-0 no-gutters">
             <div class="col-md-3 col-sm-3 my-auto">
               <img src="Images/Dieta-hashimoto.png" class="img-fluid" alt="Fitbox - Dieta pudełkowa Hashimoto" title="Dieta pudełkowa Hashimoto">
             </div>
             <div class="col-md-9 col-sm-9">
               <div class="card-body">
                 <h3 class="card-title text-left">Dieta Hashimoto</h3>
                 <p>Dieta przeznaczona dla osób z zmagających się z niedoczynnością tarczycy i chorobą Hashimoto. W diecie znajdą Państwo składniki bogate w jod, selen oraz błonnik pokarmowy.</p>
                 <div class="form-row">
                   <input id="hashimoto_dieta" type="hidden" value="hashimoto"/>
                  <div class="col-sm-12 col-md-3">
                   <label for="posilki">Ile posiłków<span class="red-star">*</span></label>
                   <select id="hashimoto_posilki" class="form-control" name="posilki">
                     <option value="5">5</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="kcal">Kaloryczność<span class="red-star">*</span></label>
                   <select id="hashimoto_kcal" class="form-control" name="kcal">
                   <option value="">Wybierz...</option>
                   <option value="2500">2500</option>
                   <option value="2300">2300</option>
                   <option value="2000">2000</option>
                   <option value="1800">1800</option>
                   <option value="1700">1700</option>
                   <option value="1600">1600</option>
                   <option value="1500">1500</option>
                   <option value="1300">1300</option>
                   <option value="1200">1200</option>
                   <option value="1000">1000</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="dni">Ile dni<span class="red-star">*</span></label>
                   <select id="hashimoto_dni" class="form-control" name="dni">
                     <<option value="">Wybierz...</option>
                     <option value="30">30</option>
                     <option value="20">20</option>
                     <option value="15">15</option>
                     <option value="10">10</option>
                     <option value="5">5</option>
                     <option value="1">1</option>
                   </select>
                  </div>
                  <div class="col-12 mt-1">
                    <div class="slide-in">
                       <button onclick="cart('add','hashimoto')" title="Dodaj do koszyka" class="btn btn-zamow">Dodaj do koszyka</button>
                       <div class="slide-eff"></div>
                    </div>
                  </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div><!--=== card end ===-->

       <div class="col-md-12 col-sm-12 mx-auto all-diets" id="sport">
         <div class="card mb-2">
           <div class="row m-0 no-gutters">
             <div class="col-md-3 col-sm-3 my-auto">
               <img src="Images/Dieta-sport.png" class="img-fluid" alt="Fitbox - Dieta pudełkowa sport" title="Dieta pudełkowa sport">
             </div>
             <div class="col-md-9 col-sm-9">
               <div class="card-body">
                 <h3 class="card-title text-left">Dieta sport</h3>
                 <p>Smaczna i urozmaicona dieta sport jest idealną dietą dla osób aktywnych, które potrzebują więcej kalorii oraz wartościowych składników odżywczych.</p>
                 <div class="form-row">
                   <input id="sport_dieta" type="hidden" value="sport"/>
                  <div class="col-sm-12 col-md-3">
                   <label for="posilki">Ile posiłków<span class="red-star">*</span></label>
                   <select id="sport_posilki" class="form-control" name="posilki">
                     <option value="5">5</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="kcal">Kaloryczność<span class="red-star">*</span></label>
                   <select id="sport_kcal" class="form-control" name="kcal">
                   <option value="">Wybierz...</option>
                   <option value="3800">3800</option>
                   <option value="3700">3700</option>
                   <option value="3600">3600</option>
                   <option value="3500">3500</option>
                   <option value="3000">3000</option>
                   <option value="2500">2500</option>
                   </select>
                  </div>
                  <div class="col-sm-12 col-md-2">
                   <label for="dni">Ile dni<span class="red-star">*</span></label>
                   <select id="sport_dni" class="form-control" name="dni">
                     <<option value="">Wybierz...</option>
                     <option value="30">30</option>
                     <option value="20">20</option>
                     <option value="15">15</option>
                     <option value="10">10</option>
                     <option value="5">5</option>
                     <option value="1">1</option>
                   </select>
                  </div>
                  <div class="col-12 mt-1">
                    <div class="slide-in">
                       <button onclick="cart('add','sport')" title="Dodaj do koszyka" class="btn btn-zamow">Dodaj do koszyka</button>
                       <div class="slide-eff"></div>
                    </div>
                  </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div><!--=== card end ===-->


    </div><!--=== Tab Choose Diet End ===-->

    <!--=== Tab My Account ===-->
    <div class="row mx-1 diets tab-pane fade my-acount-tab px-md-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
     <div class="col-md-12 col-sm-12 mx-auto all-diets">
       <form class="mx-auto " method="post" action="zmien-dane"> <!-- update klient data in db-->
           <div class="row">
             <div class="col-12">
               <h3 class="text-center font-amatic font-black ">Przed zamówieniem diety sprawdź <a class="link" href="https://fitbox.com.pl/gdzie-dowozimy" title="Gdzie dowozimy nasze diety pudełkowe">gdzie dowozimy</a> nasze FitBoxy</h3>
             </div>
           </div>
           <div class="row">
             <div class="col-12 pb-3">
               <h2 class="text-left font-amatic font-black">Twoje dane</h2>
             </div>
           </div>

           <div class="form-row">
             <div class="col-sm-12 col-md-6 form-group">
               <label class="form-label" for="podaj-imie">Imię<span class="red-star">*</span></label>
               <input type="text" value="<?php echo $_SESSION['user-id'];?>" name="id" hidden>
               <input type="text" id="podaj-imie" class="form-input" name="name" autocomplete="off" value="<?php if(isset($_SESSION['user-name'])) {echo $_SESSION['user-name'];} else {} ?>">
             </div>
             <div class="col-sm-12 col-md-6 form-group">
               <label class="form-label" for="podaj-nazwisko">Nazwisko<span class="red-star">*</span></label>
               <input type="text" id="podaj-nazwisko" class="form-input" name="surname" autocomplete="off" title="Nazwiska dwuczłonowe wpisz z myślnikiem" value="<?php if(isset($_SESSION['user-surname'])) {echo $_SESSION['user-surname'];} else {} ?>">
               <button type="button" class="btn btn-tooltip" data-toggle="tooltip" data-placement="bottom" title="Nazwiska dwuczłonowe wpisz oddzielając je myślnikiem">
                 <i class="far fa-question-circle"></i>
               </button>
             </div>
           </div>
           <div class="form-row">
             <div class="col-sm-12 col-md-6 form-group">
             <label class="form-label" for="podaj-ulice">Ulica<span class="red-star">*</span></label>
             <input type="text" id="podaj-ulice" class="form-input" name="street" autocomplete="off" value="<?php if(isset($_SESSION['user-street'])) {echo $_SESSION['user-street'];} else {} ?>">
           </div>
           <div class="col-sm-12 col-md-3 form-group">
             <label class="form-label" for="podaj-numer-domu">Nr domu<span class="red-star">*</span></label>
             <input type="text" id="podaj-numer-domu" class="form-input" name="house-num" autocomplete="off" value="<?php if(isset($_SESSION['user-street-number'])) {echo $_SESSION['user-street-number'];} else {} ?>">
           </div>
           <div class="col-sm-12 col-md-3 form-group">
             <label class="form-label" for="podaj-numer-mieszkania">Nr mieszkania</label>
             <input type="text" id="podaj-numer-mieszkania" class="form-input" name="flat-num" autocomplete="off" value="<?php if(isset($_SESSION['user-flat-number'])) {echo $_SESSION['user-flat-number'];} else {} ?>">
           </div>
         </div>
         <div class="form-row">
           <div class="col-sm-12 col-md-8 form-group">
             <label class="form-label" for="podaj-miasto">Miasto<span class="red-star">*</span></label>
             <input type="text" id="podaj-miasto" class="form-input" name="city" autocomplete="off" value="<?php if(isset($_SESSION['user-city'])) {echo $_SESSION['user-city'];} else {} ?>">
           </div>
           <div class="col-sm-12 col-md-4 form-group">
             <label class="form-label" for="podaj-kod">Kod pocztowy<span class="red-star">*</span></label>
             <input type="text" id="podaj-kod" class="form-input" name="postcode" autocomplete="off" value="<?php if(isset($_SESSION['user-postcode'])) {echo $_SESSION['user-postcode'];} else {} ?>">
             <button type="button" class="btn btn-tooltip" data-toggle="tooltip" data-placement="bottom" title="Poprawny format kodu pocztowego: XX-XXX">
               <i class="far fa-question-circle"></i>
             </button>
           </div>
         </div>
         <div class="form-row">
           <div class="col-sm-12 col-md-6 form-group">
             <label class="form-label" for="podaj-email">Adres e-mail</label>
             <input type="email" class="form-input" disabled value="<?php if(isset($_SESSION['user-email'])) {echo $_SESSION['user-email'];} else {} ?>">
             <button type="button" class="btn btn-tooltip" data-toggle="tooltip" data-placement="bottom" title="Adresu e-mail nie można edytować.">
               <i class="far fa-question-circle"></i>
             </button>
           </div>
             <div class="col-sm-12 col-md-6 form-group">
             <label class="form-label" for="podaj-telefon">Telefon<span class="red-star">*</span></label>
             <input type="text" id="podaj-telefon" class="form-input" name="phone-num" autocomplete="off" value="<?php if(isset($_SESSION['user-phone'])) {echo $_SESSION['user-phone'];} else {} ?>">
             <button type="button" class="btn btn-tooltip" data-toggle="tooltip" data-placement="bottom" title="Poprawny format np. 558558558">
               <i class="far fa-question-circle"></i>
             </button>
           </div>
         </div>
         <div class="row">
           <div class="col-12">
             <div class="slide-in ml-auto">
               <button title="Aktualizuj dane" class="btn btn-zamow" type="submit" name="zmien">Zmień dane</button>
               <div class="slide-eff"></div>
            </div>
           </div>
         </div>
       </form>

       <!--=== Change password ===-->
       <form class="mx-auto pt-5" method="post" id="password-reset" action="zmien-haslo"> <!-- zmień hasło do serwisu w bazie-->
         <div class="row">
           <div class="col-12 pb-3">
             <h2 class="text-left font-amatic font-black">Zmień hasło</h2>
           </div>
         </div>
         <div class="form-row">
          <div class="col-sm-12 col-md-4 form-group">
           <input type="text" value="<?php echo $_SESSION['user-id'];?>" name="id" hidden>
           <label class="form-label" for="haslo">Aktualne hasło<span class="red-star">*</span></label>
           <input type="password" id="haslo" class="form-input" name="password" autocomplete="off">
          </div>
          <div class="col-sm-12 col-md-4 form-group">
           <label class="form-label" for="nowe-haslo">Nowe hasło<span class="red-star">*</span></label>
           <input type="password" id="nowe-haslo" class="form-input" name="new-password" autocomplete="off">
          </div>
          <div class="col-sm-12 col-md-4 form-group">
           <label class="form-label" for="powtorz-haslo">Powtórz nowe hasło<span class="red-star">*</span></label>
           <input type="password" id="powtorz-haslo" class="form-input" name="repeat-password" autocomplete="off">
         </div>
       </div>
       <div class="row">
         <div class="col-12">
           <div class="slide-in ml-auto">
             <button title="Aktualizuj hasło" class="btn btn-zamow" type="submit" id="change-pass" name="change-password">Zmień hasło</button>
             <div class="slide-eff"></div>
          </div>
         </div>
       </div>

      </form>
     </div>
    </div><!--=== Tab My Account End ===-->

 </div><!--=== Tab Content End ===-->

    <!--
    		<div id="klasyczna-show" class="show-diet col-sm-12 col-md-8">
    			<div class="row m-0">
    				<div class="col-sm-12 col-md-4">
    					<label for="wybierz-ilosc-posilkow-klasyczna">Ile posiłków<span class="red-star">*</span></label>
    					<select class="form-control" id="wybierz-ilosc-posilkow-klasyczna" name="klasyczna-ile-posilkow">
    					<option value="">Wybierz...</option>
    						<option value="5">5</option>
    						<option value="3">3</option>
    						<option value="1">1</option>
    				</select>
    				</div>
    					<div id="5-klasyczna-show" class="col-sm-12 col-md-4 show-kcal">
    					<label for="wybierz-kalorycznosc">Kaloryczność<span class="red-star">*</span></label>
    					<select id="wybierz-kalorycznosc" class="form-control" name="5-klasyczna-ile-kcal">
    					<option value="">Wybierz...</option>
    						<option value="2500">2500</option>
    						<option value="2300">2300</option>
                <option value="2200">2200</option>
    						<option value="2100">2100</option>
    						<option value="2000">2000</option>
    						<option value="1800">1800</option>
    						<option value="1700">1700</option>
    						<option value="1600">1600</option>
    						<option value="1500">1500</option>
    						<option value="1300">1300</option>
    						<option value="1200">1200</option>
    						<option value="1000">1000</option>
    					</select>
    				</div>
    				<div id="3-klasyczna-show" class="col-sm-12 col-md-4 show-kcal">
    				<label for="wybierz-kalorycznosc">Kaloryczność<span class="red-star">*</span></label>
    				<select class="form-control" name="3-klasyczna-ile-kcal" >
    					<option value="">Wybierz...</option>
              <option value="2500">2500</option>
    					<option value="2300">2300</option>
    					<option value="2000">2000</option>
    					<option value="1800">1800</option>
    					<option value="1700">1700</option>
    					<option value="1600">1600</option>
    					<option value="1500">1500</option>
    					<option value="1300">1300</option>
    					<option value="1200">1200</option>
    					<option value="1000">1000</option>
    				</select>
    			</div>
    				<div id="1-klasyczna-show" class="col-sm-12 col-md-4 show-kcal">
    				<label for="wybierz-kalorycznosc">Kaloryczność<span class="red-star">*</span></label>
    				<select class="form-control" name="1-klasyczna-ile-kcal">
    					<option value="">Wybierz...</option>
    					<option value="850">850</option>
    					<option value="800">800</option>
    					<option value="750">750</option>
    					<option value="670">670</option>
    					<option value="650">650</option>
    					<option value="500">500</option>
    					<option value="450">450</option>
    					<option value="400">400</option>
    					<option value="350">350</option>
    				</select>
    			</div>
    			<div class="col-sm-12 col-md-4">
    				<label for="ile-dni">Ile dni<span class="red-star">*</span></label>
    				<select id="ile-dni" class="form-control" name="klasyczna-dni">
    					<option value="">Wybierz...</option>
    					<option value="20">20</option>
    					<option value="15">15</option>
    					<option value="10">10</option>
    					<option value="5">5</option>
    					<option value="1">1</option>
    			</select>
    			</div>
    		</div>
    		</div>
    		<div id="wegetariańska-show" class="show-diet col-sm-12 col-md-8">
    			<div class="row m-0">
    				<div class="col-sm-12 col-md-4">
    					<label for="wybierz-ilosc-posilkow-wegetarianska">Ile posiłków<span class="red-star">*</span></label>
    					<select class="form-control" id="wybierz-ilosc-posilkow-wegetarianska" name="wegetariańska-ile-posilkow">
    					<option value="">Wybierz...</option>
    						<option value="5">5</option>
    						<option value="3">3</option>
    						<option value="1">1</option>
    				</select>
    				</div>
    					<div id="5-wegetariańska-show" class="col-sm-12 col-md-4 show-kcal">
    					<label for="wybierz-kalorycznosc">Kaloryczność<span class="red-star">*</span></label>
    					<select class="form-control" name="5-wegetariańska-ile-kcal">
    					<option value="">Wybierz...</option>
    						<option value="2500">2500</option>
    						<option value="2300">2300</option>
                <option value="2200">2200</option>
    						<option value="2100">2100</option>
    						<option value="2000">2000</option>
    						<option value="1800">1800</option>
    						<option value="1700">1700</option>
    						<option value="1600">1600</option>
    						<option value="1500">1500</option>
    						<option value="1300">1300</option>
    						<option value="1200">1200</option>
    						<option value="1000">1000</option>
    					</select>
    				</div>
    				<div id="3-wegetariańska-show" class="col-sm-12 col-md-4 show-kcal">
    				<label for="wybierz-kalorycznosc">Kaloryczność<span class="red-star">*</span></label>
    				<select class="form-control" name="3-wegetariańska-ile-kcal" >
    					<option value="">Wybierz...</option>
              <option value="2500">2500</option>
    					<option value="2300">2300</option>
    					<option value="2000">2000</option>
    					<option value="1800">1800</option>
    					<option value="1700">1700</option>
    					<option value="1600">1600</option>
    					<option value="1500">1500</option>
    					<option value="1300">1300</option>
    					<option value="1200">1200</option>
    					<option value="1000">1000</option>
    				</select>
    			</div>
    				<div id="1-wegetariańska-show" class="col-sm-12 col-md-4 show-kcal">
    				<label for="wybierz-kalorycznosc">Kaloryczność<span class="red-star">*</span></label>
    				<select class="form-control" name="1-wegetariańska-ile-kcal">
    					<option value="">Wybierz...</option>
    					<option value="850">850</option>
    					<option value="800">800</option>
    					<option value="750">750</option>
    					<option value="670">670</option>
    					<option value="650">650</option>
    					<option value="500">500</option>
    					<option value="450">450</option>
    					<option value="400">400</option>
    					<option value="350">350</option>
    				</select>
    			</div>
    			<div class="col-sm-12 col-md-4">
    				<label for="ile-dni">Ile dni<span class="red-star">*</span></label>
    				<select class="form-control" name="wegetariańska-dni">
    					<option value="">Wybierz...</option>
    					<option value="20">20</option>
    					<option value="15">15</option>
    					<option value="10">10</option>
    					<option value="5">5</option>
    					<option value="1">1</option>
    			</select>
    			</div>
    		</div>
    		</div>
    		<div id="bezryb-show" class="show-diet col-sm-12 col-md-8">
    			<div class="row m-0">
    				<div class="col-sm-12 col-md-4">
    					<label for="wybierz-ilosc-posilkow-bez-ryb">Ile posiłków<span class="red-star">*</span></label>
    					<select class="form-control" id="wybierz-ilosc-posilkow-bez-ryb" name="bezryb-ile-posilkow">
    					<option value="">Wybierz...</option>
    						<option value="5">5</option>
    						<option value="3">3</option>
    						<option value="1">1</option>
    				</select>
    				</div>
    					<div id="5-bezryb-show" class="col-sm-12 col-md-4 show-kcal">
    					<label for="wybierz-kalorycznosc">Kaloryczność<span class="red-star">*</span></label>
    					<select class="form-control" name="5-bezryb-ile-kcal">
    					<option value="">Wybierz...</option>
    						<option value="2500">2500</option>
    						<option value="2300">2300</option>
                <option value="2200">2200</option>
    						<option value="2100">2100</option>
    						<option value="2000">2000</option>
    						<option value="1800">1800</option>
    						<option value="1700">1700</option>
    						<option value="1600">1600</option>
    						<option value="1500">1500</option>
    						<option value="1300">1300</option>
    						<option value="1200">1200</option>
    						<option value="1000">1000</option>
    					</select>
    				</div>
    				<div id="3-bezryb-show" class="col-sm-12 col-md-4 show-kcal">
    				<label for="wybierz-kalorycznosc">Kaloryczność<span class="red-star">*</span></label>
    				<select class="form-control" name="3-bezryb-ile-kcal" >
    					<option value="">Wybierz...</option>
              <option value="2500">2500</option>
    					<option value="2300">2300</option>
    					<option value="2000">2000</option>
    					<option value="1800">1800</option>
    					<option value="1700">1700</option>
    					<option value="1600">1600</option>
    					<option value="1500">1500</option>
    					<option value="1300">1300</option>
    					<option value="1200">1200</option>
    					<option value="1000">1000</option>
    				</select>
    			</div>
    				<div id="1-bezryb-show" class="col-sm-12 col-md-4 show-kcal">
    				<label for="wybierz-kalorycznosc">Kaloryczność<span class="red-star">*</span></label>
    				<select class="form-control" name="1-bezryb-ile-kcal">
    					<option value="">Wybierz...</option>
    					<option value="850">850</option>
    					<option value="800">800</option>
    					<option value="750">750</option>
    					<option value="670">670</option>
    					<option value="650">650</option>
    					<option value="500">500</option>
    					<option value="450">450</option>
    					<option value="400">400</option>
    					<option value="350">350</option>
    				</select>
    			</div>
    			<div class="col-sm-12 col-md-4">
    				<label for="ile-dni">Ile dni<span class="red-star">*</span></label>
    				<select class="form-control" name="bezryb-dni">
    					<option value="">Wybierz...</option>
    					<option value="20">20</option>
    					<option value="15">15</option>
    					<option value="10">10</option>
    					<option value="5">5</option>
    					<option value="1">1</option>
    			</select>
    			</div>
    		</div>
    		</div>

    <div class="form-row mt-2">
      <div class="col-12">
        <label>Sposób płatności<span class="red-star">*</span></label>
      </div>
    <div class="col-12 p-0">
      <div class="row">
        <label class="select-payment col-sm-12 col-md-4">
          <input type="radio" name="payment" value="płatność elektroniczna">
          <img src="Images/imoje.png" alt="Płatnosc internetowa imoje" title="Imoje">
        </label>
      <label class="select-payment col-sm-12 col-md-4">
        <input type="radio" name="payment" value="gotówką przy pierwszym odbiorze">
        <img src="Images/platnosc-gotowka.jpg" alt="Płatnosc gotówką przy odbiorze" title="Gotówką przy odbiorze">
      </label>
      <label class="select-payment col-sm-12 col-md-4">
        <input type="radio" name="payment" value="kartą przy pierwszym odbiorze">
        <img src="Images/platnosc-karta.jpg" alt="Płatnosc kartą przy odbiorze" title="Kartą przy odbiorze">
      </label>
        </div>
      </div>
    </div>

    <div class="form-row m-0">
      <input type="text" name="yesNoCheck" value="nie" hidden>
    </div>

    <div class="form-row m-0">
      <div class="col-sm-12 pl-1 pt-3">
        <h3 class="order-form-recipe">Potrzebujesz faktury do zamówienia?</h3>
        <div class="form-check form-check-inline">
          <input class="recipe-check-input ml-0" type="checkbox" name="fakturaCheck" id="faktura" onchange="chceFakture(this);" >
          <label class="recipe-check-label ml-2 mb-0" for="faktura">Chcę otrzymać fakturę</label>
        </div>
      </div>
      <div class="col-12 mt-3" id="chceFakture" style="display:none;">
        <div class="form-row">
          <div class="col-sm-12 col-md-6 form-group">
            <label class="form-label" for="fv-firma">Firma</label>
            <input type="text" id="fv-firma" class="form-input" name="fv-firma" autocomplete="off">
          </div>
          <div class="col-sm-12 col-md-6 form-group">
            <label class="form-label" for="fv-adres">Adres</label>
            <input type="text" id="fv-adres" class="form-input" name="fv-adres" autocomplete="off">
          </div>
        </div>
        <div class="form-row">
          <div class="col-sm-12 col-md-4 form-group">
            <label class="form-label" for="fv-kod">Kod pocztowy</label>
            <input type="text" id="fv-kod" class="form-input" name="fv-kod" autocomplete="off">
            <button type="button" class="btn btn-tooltip" data-toggle="tooltip" data-placement="bottom" title="Poprawny format kodu pocztowego: XX-XXX">
              <i class="far fa-question-circle"></i>
            </button>
          </div>
          <div class="col-sm-12 col-md-4 form-group">
            <label class="form-label" for="fv-miasto">Miasto</label>
            <input type="text" id="fv-miasto" class="form-input" name="fv-miasto" autocomplete="off">
          </div>
          <div class="col-sm-12 col-md-4 form-group">
            <label class="form-label" for="fv-nip">NIP</label>
            <input type="text" id="fv-nip" class="form-input" name="fv-nip" autocomplete="off">
          </div>
        </div>
  </div>
</div>
      <div class="form-row m-0">
        <div class="col-sm-12 pt-3">
        <input class="form-check-input ml-0" type="checkbox" required onchange="this.setCustomValidity(validity.valueMissing ? 'Potwierdź, że akceptujesz Regulamin i Politykę prywatności' : '');" value="" id="accept-one">
        <label class="form-check-label ml-3" for="accept-one"> Oświadczam, iż zapoznałem się i akceptuję <a href="https://fitbox.com.pl/regulamin" target="_blank">Regulamin</a> oraz <a href="https://fitbox.com.pl/polityka-prywatnosci" target="_blank">Politykę prywatności</a> Fitbox.</label><br>
        <input class="form-check-input ml-0" type="checkbox" required onchange="this.setCustomValidity(validity.valueMissing ? 'Potwierdź zgodę na przetwarzanie danych osobowych' : '');" value="" id="accept-two">
        <label class="form-check-label ml-3" for="accept-two">Wyrażam zgodę na przetwarzanie danych osobowych zgodnie z ustawą o ochronie danych osobowych w celu złożenia zamówienia. Podanie danych jest dobrowolne, ale niezbędne do złożenia zamówienia. Zostałem poinformowany, że przysługuje mi prawo dostępu do swoich danych, możliwości ich poprawiania, żądania zaprzestania ich przetwarzania. Administratorem danych osobowych jest Firma SKdesign Sylwia Kurasiewicz-Gołąb, ul.Wojska Polskiego 4/23, 37-450 Stalowa Wola; NIP 8652340677.</label>
        </div>
      </div>
    <div class="slide-in diet-button ml-auto">
      <button title="Podsumowanie zamowienia" class="btn btn-zamow" type="submit" name="place-order-button">Podsumowanie &raquo;</button>
      <div class="slide-eff"></div>
    </div>

    <div class="row">
      <div class="col-12">
        <p class="pt-1 mb-0 font-slabo info-diet">** W przypadku problemów ze złożeniem zamówienia prosimy o kontakt telefoniczny (690 957 220) lub mailowy fitbox.dieta@gmail.com</p>
      </div>
    </div>
  </form>-->

    <!--=== Shoping Cart Section ===-->
  <div class="col-4 py-1 px-0 ">
    <div class="row mx-1 sticky-top">
      <div class="table-responsive diets" id="cart-item">

          <?php include_once "Cart/store-items.php"; ?>

      </div>
    </div>
  </div>
</div>
<?php include_once "../scripts/order-scripts.php";
if (isset($_SESSION['msg_success'])) { //wyświetlenie wiadomości
  $success = $_SESSION['msg_success'];
  echo "<script>
       flashy('$success', {
          type: 'flashy__success'
       });
      </script>";
  unset($_SESSION['msg_success']);
} else {
  if (isset($_SESSION['msg_error'])) {
    $error = $_SESSION['msg_error'];
    echo "<script>
         flashy('$error', {
            type: 'flashy__danger'
         });
        </script>";
    unset($_SESSION['msg_error']);
  }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
document.getElementById("klasyczna_posilki").onchange=function(){for(var e=0;e<document.getElementsByClassName("show-kcal").length;e++)document.getElementsByClassName("show-kcal")[e].style.display="none";document.getElementById(document.getElementById("klasyczna_posilki").value+"-klasyczna-show").style.display="block"};
</script>
<script>
function cart(action, product_code)
{
var ele=document.getElementById(product_code);
var img=ele.getElementsByTagName("img")[0].src;
var diet=document.getElementById(product_code+"_dieta").value;
var meals=document.getElementById(product_code+"_posilki").value;
var kcal=document.getElementById(product_code+"_kcal").value;
var days=document.getElementById(product_code+"_dni").value;

$.ajax({
    method:'POST',
    url:'koszyk',
    data: {
          "item_action" : action,
          "item_id" : product_code,
          "item_diet" : diet+meals+kcal+days,
          "item_img" : img,
          "item_meals" : meals,
          "item_kcal" : kcal,
          "item_days" : days
         },
    success:function(data) {
      $("#cart-item").html(data);
    }
  });

}

function removeFromCart(action, product_code) {
  $.ajax({
      method:'POST',
      url:'koszyk',
      data: {
            "item_action" : action,
            "item_delete" : product_code
           },
      success:function(data) {
        $("#cart-item").html(data);
      }
    });
}
</script>
</body>
</html>
