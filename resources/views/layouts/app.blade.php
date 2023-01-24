<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        
        <script src="https://unpkg.com/flowbite@1.5.5/dist/datepicker.js"></script>
        <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
        <script>
            $(document).ready(function(){
                $("#table-search-users").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#mainTable tr").filter(function() {
                        $('#head').show();
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });

                
                $('#mainTable tr').click(function (event) {
                    if (event.target.type !== 'checkbox') {
                        $(':checkbox', this).trigger('click');
                    }
                });

                $(document).on('click','input[name="mainCheckbox"]', function(){
                    if(this.checked){
                    $('input[name="userCheckbox[]"]').each(function(){
                        this.checked = true;
                    });
                    }else{
                        $('input[name="userCheckbox[]"]').each(function(){
                            this.checked = false;
                        });
                    }
                    toggleConfirmChanges();
                });
                $(document).on('change','input[name="userCheckbox[]"]', function(){
                    if( $('input[name="userCheckbox[]"]').length == $('input[name="userCheckbox[]"]:checked').length ){
                        $('input[name="mainCheckbox"]').prop('checked', true);
                    }else{
                        $('input[name="mainCheckbox"]').prop('checked', false);
                    }
                    toggleConfirmChanges();
                });
                
                function toggleConfirmChanges(){
                    if( $('input[name="userCheckbox[]"]:checked').length > 0 ){
                        $('button#confirmChanges').text('Confirm Changes ('+$('input[name="userCheckbox[]"]:checked').length+')').removeClass('hidden');
                        $('select#applicantstatus').removeClass('hidden');
                    }else{
                        $('button#confirmChanges').addClass('hidden');
                        $('select#applicantstatus').addClass('hidden');
                    }
                }

                $("#fatherage").addClass("bg-slate-200").prop('disabled', true);
                $("#fatheroccupation").addClass("bg-slate-200").prop('disabled', true);
                $("#fatherincome").addClass("bg-slate-200").prop('disabled', true);
                $("#fathercontactno").addClass("bg-slate-200").prop('disabled', true);
                $("#fatherreligion").addClass("bg-slate-200").prop('disabled', true);
                $("#motherage").addClass("bg-slate-200").prop('disabled', true);
                $("#motheroccupation").addClass("bg-slate-200").prop('disabled', true);
                $("#motherincome").addClass("bg-slate-200").prop('disabled', true);
                $("#mothercontactno").addClass("bg-slate-200").prop('disabled', true);
                $("#motherreligion").addClass("bg-slate-200").prop('disabled', true);
                $("#parentstatus").addClass("bg-slate-200").prop('disabled', true);
                $("#guardiancontactno").addClass("bg-slate-200").prop('disabled', true);
                $("#pwdage-0").addClass("bg-slate-200").prop('disabled', true);
                $("#pwdage-1").addClass("bg-slate-200").prop('disabled', true);
                $("#pwdage-2").addClass("bg-slate-200").prop('disabled', true);
                $("#siblingage-0").addClass("bg-slate-200").prop('disabled', true);
                $("#siblingyearorwork-0").addClass("bg-slate-200").prop('disabled', true);
                $("#siblingage-1").addClass("bg-slate-200").prop('disabled', true);
                $("#siblingyearorwork-1").addClass("bg-slate-200").prop('disabled', true);
                $("#siblingage-2").addClass("bg-slate-200").prop('disabled', true);
                $("#siblingyearorwork-2").addClass("bg-slate-200").prop('disabled', true);
                $("#siblingage-3").addClass("bg-slate-200").prop('disabled', true);
                $("#siblingyearorwork-3").addClass("bg-slate-200").prop('disabled', true);
                $("#relativeage-0").addClass("bg-slate-200").prop('disabled', true);
                $("#relativerelation-0").addClass("bg-slate-200").prop('disabled', true);
                $("#relativework-0").addClass("bg-slate-200").prop('disabled', true);
                $("#relativeage-1").addClass("bg-slate-200").prop('disabled', true);
                $("#relativerelation-1").addClass("bg-slate-200").prop('disabled', true);
                $("#relativework-1").addClass("bg-slate-200").prop('disabled', true);
                $("#relativeage-2").addClass("bg-slate-200").prop('disabled', true);
                $("#relativerelation-2").addClass("bg-slate-200").prop('disabled', true);
                $("#relativework-2").addClass("bg-slate-200").prop('disabled', true);
                $("#relativeage-3").addClass("bg-slate-200").prop('disabled', true);
                $("#relativerelation-3").addClass("bg-slate-200").prop('disabled', true);
                $("#relativework-3").addClass("bg-slate-200").prop('disabled', true);

                var selectedRenewal = $("select#renewal option:selected").val(); 
                if(selectedRenewal == 'OLD'){
                    $("#scholaryears").removeClass("bg-slate-200").prop('disabled', false);
                    // $("#file_input_baptismal_label").addClass("hidden");
                    // $("#file_input_baptismal").addClass("hidden");
                    // $("#baptismal_svg").addClass("hidden");
                    $("#baptismal_div").addClass("hidden");
                    // $("#file_input_birth_label").addClass("hidden");
                    // $("#file_input_birth").addClass("hidden");
                    $("#birth_div").addClass("hidden");
                    // $("#file_input_regi_report_label").addClass("hidden");
                    // $("#file_input_regi_report").addClass("hidden");
                    // $("#regi_report_div").addClass("hidden");
                    // $("#file_input_regi_label").removeClass("hidden");
                    // $("#file_input_regi").removeClass("hidden");
                    // $("#regi_div").removeClass("hidden");
                    // $("#file_input_report_label").removeClass("hidden");
                    // $("#file_input_report").removeClass("hidden");
                    // $("#report_div").removeClass("hidden");
                }else if (selectedRenewal == 'NEW'){
                    $("#scholaryears").addClass("bg-slate-200").prop('disabled', true).val(0);
                    // $("#file_input_baptismal_label").removeClass("hidden");
                    // $("#file_input_baptismal").removeClass("hidden");
                    // $("#baptismal_svg").removeClass("hidden");
                    $("#baptismal_div").removeClass("hidden");
                    // $("#file_input_birth_label").removeClass("hidden");
                    // $("#file_input_birth").removeClass("hidden");
                    $("#birth_div").removeClass("hidden");
                    // $("#file_input_regi_report_label").removeClass("hidden");
                    // $("#file_input_regi_report").removeClass("hidden");
                    // $("#regi_report_div").removeClass("hidden");
                    // $("#file_input_regi_label").addClass("hidden");
                    // $("#file_input_regi").addClass("hidden");
                    // $("#regi_div").addClass("hidden");
                    // $("#file_input_report_label").addClass("hidden");
                    // $("#file_input_report").addClass("hidden");
                    // $("#report_div").addClass("hidden");
                }else if (selectedRenewal == ''){
                    $("#scholaryears").addClass("bg-slate-200").prop('disabled', true).val();
                    // $("#file_input_baptismal_label").addClass("hidden");
                    // $("#file_input_baptismal").addClass("hidden");
                    // $("#baptismal_svg").addClass("hidden");
                    $("#baptismal_div").addClass("hidden");
                    // $("#file_input_birth_label").addClass("hidden");
                    // $("#file_input_birth").addClass("hidden");
                    $("#birth_div").addClass("hidden");
                    // $("#file_input_regi_report_label").addClass("hidden");
                    // $("#file_input_regi_report").addClass("hidden");
                    // $("#regi_report_div").addClass("hidden");
                    // $("#file_input_regi_label").addClass("hidden");
                    // $("#file_input_regi").addClass("hidden");
                    // $("#regi_div").addClass("hidden");
                    // $("#file_input_report_label").addClass("hidden");
                    // $("#file_input_report").addClass("hidden");
                    // $("#report_div").addClass("hidden");
                }

                $("select#renewal").change(function(){
                    var selectedRenewal = $(this).children("option:selected").val();
                    if(selectedRenewal == 'OLD'){
                        $("#scholaryears").removeClass("bg-slate-200").prop('disabled', false).val(null).focus();
                        // $("#file_input_baptismal_label").addClass("hidden");
                        // $("#file_input_baptismal").addClass("hidden");
                        // $("#baptismal_svg").addClass("hidden");
                        // $("#baptismal_error").addClass("hidden");
                        $("#baptismal_div").addClass("hidden");
                        // $("#file_input_birth_label").addClass("hidden");
                        // $("#file_input_birth").addClass("hidden");
                        // $("#birth_error").addClass("hidden");
                        $("#birth_div").addClass("hidden");
                        // $("#file_input_regi_report_label").addClass("hidden");
                        // $("#file_input_regi_report").addClass("hidden");
                        // $("#regi_report_error").addClass("hidden");
                        // $("#regi_report_div").addClass("hidden");
                        // $("#file_input_regi_label").removeClass("hidden");
                        // $("#file_input_regi").removeClass("hidden");
                        // $("#regi_error").removeClass("hidden");
                        // $("#regi_div").removeClass("hidden");
                        // $("#file_input_report_label").removeClass("hidden");
                        // $("#file_input_report").removeClass("hidden");
                        // $("#report_error").removeClass("hidden");
                        // $("#report_div").removeClass("hidden");
                    }else if (selectedRenewal == 'NEW'){
                        $("#scholaryears").addClass("bg-slate-200").prop('disabled', true).val(0);
                        // $("#file_input_baptismal_label").removeClass("hidden");
                        // $("#file_input_baptismal").removeClass("hidden");
                        // $("#baptismal_svg").removeClass("hidden");
                        // $("#baptismal_error").removeClass("hidden");
                        $("#baptismal_div").removeClass("hidden");
                        // $("#file_input_birth_label").removeClass("hidden");
                        // $("#file_input_birth").removeClass("hidden");
                        // $("#birth_error").removeClass("hidden");
                        $("#birth_div").removeClass("hidden");
                        // $("#file_input_regi_report_label").removeClass("hidden");
                        // $("#file_input_regi_report").removeClass("hidden");
                        // $("#regi_report_error").removeClass("hidden");
                        // $("#regi_report_div").removeClass("hidden");
                        // $("#file_input_regi_label").addClass("hidden");
                        // $("#file_input_regi").addClass("hidden");
                        // $("#regi_error").addClass("hidden");
                        // $("#regi_div").addClass("hidden");
                        // $("#file_input_report_label").addClass("hidden");
                        // $("#file_input_report").addClass("hidden");
                        // $("#report_error").addClass("hidden");
                        // $("#report_div").addClass("hidden");
                    }
                });

                var college = ['1ST YEAR COLLEGE', '2ND YEAR COLLEGE', '3RD YEAR COLLEGE', '4TH YEAR COLLEGE'];
                $("select#gradeyearorlevel").change(function(){
                    if ($.inArray($("select#gradeyearorlevel").val(), college) == -1){
                        $("#course").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#genave").attr("name","elemtohsgenave");
                    }else{
                        $("#course").removeClass("bg-slate-200").prop('disabled', false).focus();
                        $("#genave").attr("name","collegegenave");
                    }
                });

                if ($.inArray($("select#gradeyearorlevel").val(), college) == -1){
                    $("#course").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#genave").attr("name","elemtohsgenave");
                }else{
                    $("#course").removeClass("bg-slate-200").prop('disabled', false);
                    $("#genave").attr("name","collegegenave");
                }

                $("select#applicantministryans").change(function(){
                    var selectedMinistry = $(this).children("option:selected").val();
                    if (selectedMinistry == 'OO'){
                        $("#applicantministry").removeClass("bg-slate-200").prop('disabled', false).focus();
                    }else{
                        $("#applicantministry").addClass("bg-slate-200").prop('disabled', true).val(null);
                    }
                });

                var selectedApplicantMinistry = $("select#applicantministryans option:selected").val(); 
                if (selectedApplicantMinistry == 'OO'){
                    $("#applicantministry").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#applicantministry").addClass("bg-slate-200").prop('disabled', true).val(null);
                }

                $("select#parentapplicantministryans").change(function(){
                    var selectedMinistry = $(this).children("option:selected").val();
                    if (selectedMinistry == 'OO'){
                        $("#parentapplicantministry").removeClass("bg-slate-200").prop('disabled', false).focus();
                    }else{
                        $("#parentapplicantministry").addClass("bg-slate-200").prop('disabled', true).val(null);
                    }
                });

                var selectedParentApplicantMinistry = $("select#parentapplicantministryans option:selected").val(); 
                if (selectedParentApplicantMinistry == 'OO'){
                    $("#parentapplicantministry").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#parentapplicantministry").addClass("bg-slate-200").prop('disabled', true).val(null);
                }

                $("#fathername").on("input", function(){
                    if ($("#fathername").val()){
                        $("#fatherage").removeClass("bg-slate-200").prop('disabled', false);
                        $("#fatheroccupation").removeClass("bg-slate-200").prop('disabled', false);
                        $("#fatherincome").removeClass("bg-slate-200").prop('disabled', false);
                        $("#fathercontactno").removeClass("bg-slate-200").prop('disabled', false);
                        $("#fatherreligion").removeClass("bg-slate-200").prop('disabled', false);
                        $("#parentstatus").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#fatherage").addClass("bg-slate-200").prop('disabled', true);
                        $("#fatheroccupation").addClass("bg-slate-200").prop('disabled', true);
                        $("#fatherincome").addClass("bg-slate-200").prop('disabled', true);
                        $("#fathercontactno").addClass("bg-slate-200").prop('disabled', true);
                        $("#fatherreligion").addClass("bg-slate-200").prop('disabled', true);
                        $("#parentstatus").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                }); 

                if ($("#fathername").val()){
                    $("#fatherage").removeClass("bg-slate-200").prop('disabled', false);
                    $("#fatheroccupation").removeClass("bg-slate-200").prop('disabled', false);
                    $("#fatherincome").removeClass("bg-slate-200").prop('disabled', false);
                    $("#fathercontactno").removeClass("bg-slate-200").prop('disabled', false);
                    $("#fatherreligion").removeClass("bg-slate-200").prop('disabled', false);
                    $("#parentstatus").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#fatherage").addClass("bg-slate-200").prop('disabled', true);
                    $("#fatheroccupation").addClass("bg-slate-200").prop('disabled', true);
                    $("#fatherincome").addClass("bg-slate-200").prop('disabled', true);
                    $("#fathercontactno").addClass("bg-slate-200").prop('disabled', true);
                    $("#fatherreligion").addClass("bg-slate-200").prop('disabled', true);
                    $("#parentstatus").addClass("bg-slate-200").prop('disabled', true);
                }

                $("#mothername").on("input", function(){
                    if ($("#mothername").val()){
                        $("#motherage").removeClass("bg-slate-200").prop('disabled', false);
                        $("#motheroccupation").removeClass("bg-slate-200").prop('disabled', false);
                        $("#motherincome").removeClass("bg-slate-200").prop('disabled', false);
                        $("#mothercontactno").removeClass("bg-slate-200").prop('disabled', false);
                        $("#motherreligion").removeClass("bg-slate-200").prop('disabled', false);
                        $("#parentstatus").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#motherage").addClass("bg-slate-200").prop('disabled', true);
                        $("#motheroccupation").addClass("bg-slate-200").prop('disabled', true);
                        $("#motherincome").addClass("bg-slate-200").prop('disabled', true);
                        $("#mothercontactno").addClass("bg-slate-200").prop('disabled', true);
                        $("#motherreligion").addClass("bg-slate-200").prop('disabled', true);
                        $("#parentstatus").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                }); 

                if ($("#mothername").val()){
                    $("#motherage").removeClass("bg-slate-200").prop('disabled', false);
                    $("#motheroccupation").removeClass("bg-slate-200").prop('disabled', false);
                    $("#motherincome").removeClass("bg-slate-200").prop('disabled', false);
                    $("#mothercontactno").removeClass("bg-slate-200").prop('disabled', false);
                    $("#motherreligion").removeClass("bg-slate-200").prop('disabled', false);
                    $("#parentstatus").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#motherage").addClass("bg-slate-200").prop('disabled', true);
                    $("#motheroccupation").addClass("bg-slate-200").prop('disabled', true);
                    $("#motherincome").addClass("bg-slate-200").prop('disabled', true);
                    $("#mothercontactno").addClass("bg-slate-200").prop('disabled', true);
                    $("#motherreligion").addClass("bg-slate-200").prop('disabled', true);
                    $("#parentstatus").addClass("bg-slate-200").prop('disabled', true);
                }

                $("#guardianname").on("input", function(){
                    if ($("#guardianname").val()){
                        $("#guardiancontactno").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#guardiancontactno").addClass("bg-slate-200").prop('disabled', true);
                    }
                });

                if ($("#guardianname").val()){
                    $("#guardiancontactno").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#guardiancontactno").addClass("bg-slate-200").prop('disabled', true);
                }
                
                $("#pwdname-0").on("input", function(){
                    if ($("#pwdname-0").val()){
                        $("#pwdage-0").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#pwdage-0").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                });

                if ($("#pwdname-0").val()){
                    $("#pwdage-0").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#pwdage-0").addClass("bg-slate-200").prop('disabled', true).val('');
                }

                $("#pwdname-1").on("input", function(){
                    if ($("#pwdname-1").val()){
                        $("#pwdage-1").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#pwdage-1").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                });
            
                if ($("#pwdname-1").val()){
                    $("#pwdage-1").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#pwdage-1").addClass("bg-slate-200").prop('disabled', true).val('');
                }

                $("#pwdname-2").on("input", function(){
                    if ($("#pwdname-2").val()){
                        $("#pwdage-2").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#pwdage-2").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                });

                if ($("#pwdname-2").val()){
                    $("#pwdage-2").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#pwdage-2").addClass("bg-slate-200").prop('disabled', true).val('');
                }

                $("#siblingname-0").on("input", function(){
                    if ($("#siblingname-0").val()){
                        $("#siblingage-0").removeClass("bg-slate-200").prop('disabled', false);
                        $("#siblingyearorwork-0").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#siblingage-0").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#siblingyearorwork-0").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                });
                
                if ($("#siblingname-0").val()){
                    $("#siblingage-0").removeClass("bg-slate-200").prop('disabled', false);
                    $("#siblingyearorwork-0").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#siblingage-0").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#siblingyearorwork-0").addClass("bg-slate-200").prop('disabled', true).val('');
                }

                $("#siblingname-1").on("input", function(){
                    if ($("#siblingname-1").val()){
                        $("#siblingage-1").removeClass("bg-slate-200").prop('disabled', false);
                        $("#siblingyearorwork-1").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#siblingage-1").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#siblingyearorwork-1").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                });

                if ($("#siblingname-1").val()){
                    $("#siblingage-1").removeClass("bg-slate-200").prop('disabled', false);
                    $("#siblingyearorwork-1").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#siblingage-1").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#siblingyearorwork-1").addClass("bg-slate-200").prop('disabled', true).val('');
                }

                $("#siblingname-2").on("input", function(){
                    if ($("#siblingname-2").val()){
                        $("#siblingage-2").removeClass("bg-slate-200").prop('disabled', false);
                        $("#siblingyearorwork-2").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#siblingage-2").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#siblingyearorwork-2").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                });

                if ($("#siblingname-2").val()){
                    $("#siblingage-2").removeClass("bg-slate-200").prop('disabled', false);
                    $("#siblingyearorwork-2").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#siblingage-2").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#siblingyearorwork-2").addClass("bg-slate-200").prop('disabled', true).val('');
                }

                $("#siblingname-3").on("input", function(){
                    if ($("#siblingname-3").val()){
                        $("#siblingage-3").removeClass("bg-slate-200").prop('disabled', false);
                        $("#siblingyearorwork-3").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#siblingage-3").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#siblingyearorwork-3").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                });
                
                if ($("#siblingname-3").val()){
                    $("#siblingage-3").removeClass("bg-slate-200").prop('disabled', false);
                    $("#siblingyearorwork-3").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#siblingage-3").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#siblingyearorwork-3").addClass("bg-slate-200").prop('disabled', true).val('');
                }

                $("#relativename-0").on("input", function(){
                    if ($("#relativename-0").val()){
                        $("#relativeage-0").removeClass("bg-slate-200").prop('disabled', false);
                        $("#relativerelation-0").removeClass("bg-slate-200").prop('disabled', false);
                        $("#relativework-0").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#relativeage-0").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#relativerelation-0").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#relativework-0").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                });

                if ($("#relativename-0").val()){
                    $("#relativeage-0").removeClass("bg-slate-200").prop('disabled', false);
                    $("#relativerelation-0").removeClass("bg-slate-200").prop('disabled', false);
                    $("#relativework-0").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#relativeage-0").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#relativerelation-0").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#relativework-0").addClass("bg-slate-200").prop('disabled', true).val('');
                }

                $("#relativename-1").on("input", function(){
                    if ($("#relativename-1").val()){
                        $("#relativeage-1").removeClass("bg-slate-200").prop('disabled', false);
                        $("#relativerelation-1").removeClass("bg-slate-200").prop('disabled', false);
                        $("#relativework-1").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#relativeage-1").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#relativerelation-1").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#relativework-1").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                });

                if ($("#relativename-1").val()){
                    $("#relativeage-1").removeClass("bg-slate-200").prop('disabled', false);
                    $("#relativerelation-1").removeClass("bg-slate-200").prop('disabled', false);
                    $("#relativework-1").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#relativeage-1").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#relativerelation-1").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#relativework-1").addClass("bg-slate-200").prop('disabled', true).val('');
                }

                $("#relativename-2").on("input", function(){
                    if ($("#relativename-2").val()){
                        $("#relativeage-2").removeClass("bg-slate-200").prop('disabled', false);
                        $("#relativerelation-2").removeClass("bg-slate-200").prop('disabled', false);
                        $("#relativework-2").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#relativeage-2").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#relativerelation-2").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#relativework-2").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                });

                if ($("#relativename-2").val()){
                    $("#relativeage-2").removeClass("bg-slate-200").prop('disabled', false);
                    $("#relativerelation-2").removeClass("bg-slate-200").prop('disabled', false);
                    $("#relativework-2").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#relativeage-2").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#relativerelation-2").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#relativework-2").addClass("bg-slate-200").prop('disabled', true).val('');
                }

                $("#relativename-3").on("input", function(){
                    if ($("#relativename-3").val()){
                        $("#relativeage-3").removeClass("bg-slate-200").prop('disabled', false);
                        $("#relativerelation-3").removeClass("bg-slate-200").prop('disabled', false);
                        $("#relativework-3").removeClass("bg-slate-200").prop('disabled', false);
                    }else{
                        $("#relativeage-3").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#relativerelation-3").addClass("bg-slate-200").prop('disabled', true).val('');
                        $("#relativework-3").addClass("bg-slate-200").prop('disabled', true).val('');
                    }
                });

                if ($("#relativename-3").val()){
                    $("#relativeage-3").removeClass("bg-slate-200").prop('disabled', false);
                    $("#relativerelation-3").removeClass("bg-slate-200").prop('disabled', false);
                    $("#relativework-3").removeClass("bg-slate-200").prop('disabled', false);
                }else{
                    $("#relativeage-3").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#relativerelation-3").addClass("bg-slate-200").prop('disabled', true).val('');
                    $("#relativework-3").addClass("bg-slate-200").prop('disabled', true).val('');
                }

                
                $("select#adminreportgen").change(function(){
                    var selectedDropdown = $(this).children("option:selected").val();
                    if (selectedDropdown == 'applicant'){
                        $("#applicantstatusdropdown").removeClass("hidden");
                    }else{
                        $("#applicantstatusdropdown").addClass("hidden");
                    }
                   
                    
                });
                
            });
        </script>
    </body>
</html>
