<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css" integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .tickets-container .tickets-list .ticket-item .ticket-state i {
        font-size: 13px;
        color: #fff;
        line-height: 20px;
    }

    .tickets-container .tickets-list .ticket-item .ticket-state {
        position: absolute;
        top: 13px;
        right: -12px;
        height: 24px;
        width: 24px;
        -webkit-border-radius: 50%;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 50%;
        -moz-background-clip: padding;
        border-radius: 50%;
        background-clip: padding-box;
        background-color: #e5e5e5;
        text-align: center;
        -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, .2);
        -moz-box-shadow: 0 0 3px rgba(0, 0, 0, .2);
        box-shadow: 0 0 3px rgba(0, 0, 0, .2);
        border: 2px solid #fff;
    }

    .bg-palegreen {
        background-color: #a0d468 !important;
    }

    .bg-darkorange {
        background-color: #ff0000 !important;
    }

    .bg-yellow {
        background-color: #FFFF00 !important;
    }

    .tickets-container .tickets-list .ticket-item .ticket-type .type {
        color: #999;
        font-size: 11px;
        text-transform: uppercase;
    }

    .tickets-container .tickets-list .ticket-item .ticket-type {
        line-height: 30px;
        height: 50px;
        padding: 10px;
    }

    .tickets-container .tickets-list .ticket-item .ticket-time i {
        color: #ccc;
        width: 50px;
    }

    .tickets-container .tickets-list .ticket-item .divider {
        position: absolute;
        top: 0;
        left: 0;
        height: 50px;
        width: 1px;
        background-color: #eee;
        display: inline-block;
    }

    .tickets-container .tickets-list .ticket-item .ticket-time {
        line-height: 30px;
        height: 50px;
        padding: 10px;
    }

    .tickets-container .tickets-list .ticket-item .ticket-user .user-company {
        margin-left: 2px;
        color: #999;
    }

    .tickets-container .tickets-list .ticket-item .ticket-user .user-at {
        margin-left: 2px;
        color: #ccc;
        font-size: 13px;
    }

    .tickets-container .tickets-list .ticket-item .ticket-user .user-name {
        margin-left: 5px;
        font-size: 13px;
    }

    .tickets-container .tickets-list .ticket-item .ticket-user .user-avatar {
        width: 30px;
        height: 30px;
        -webkit-border-radius: 3px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 3px;
        -moz-background-clip: padding;
        border-radius: 3px;
        background-clip: padding-box;
    }

    .tickets-container .tickets-list .ticket-item .ticket-user {
        height: 50px;
        padding: 10px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .tickets-container .tickets-list .ticket-item {
        position: relative;
        background-color: #fff;
        -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, .2);
        -moz-box-shadow: 0 0 3px rgba(0, 0, 0, .2);
        box-shadow: 0 0 3px rgba(0, 0, 0, .2);
        -webkit-border-radius: 3px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 3px;
        -moz-background-clip: padding;
        border-radius: 3px;
        background-clip: padding-box;
        margin-bottom: 8px;
        padding: 0 15px;
        vertical-align: top;
    }

    .tickets-container .tickets-list {
        list-style: none;
        padding: 0;
        margin-bottom: 0;
    }

    .tickets-container {
        position: relative;
        padding: 25px 25px;
        background-color: #f5f5f5;
    }

    .widget-main.no-padding {
        padding: 0;
    }

    .widget-main {
        padding: 12px;
    }

    .no-padding {
        padding: 0 !important;
    }

    .widget-body {
        background-color: #fbfbfb;
        -webkit-box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
        -moz-box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
        box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
    }

    .widget-header>.widget-caption {
        line-height: 33px;
        padding: 0;
        margin: 0;
        float: left;
        text-align: left;
        font-weight: 400 !important;
        font-size: 13px;
    }

    .widget-header .widget-icon {
        display: block;
        width: 30px;
        height: 32px;
        position: relative;
        float: left;
        font-size: 111%;
        line-height: 32px;
        text-align: center;
        margin-left: -10px;
    }

    .themesecondary {
        color: #5bc0de !important;
    }

    .widget-header.bordered-bottom {
        border-bottom: 3px solid #fff;
    }

    .widget-header {
        position: relative;
        min-height: 35px;
        background: #fff;
        -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, .3);
        -moz-box-shadow: 0 0 4px rgba(0, 0, 0, .3);
        box-shadow: 0 0 4px rgba(0, 0, 0, .3);
        color: #555;
        padding-left: 12px;
        text-align: right;
    }

    .bordered-themesecondary {
        border-color: #5bc0de !important;
    }

    .widget-box {
        padding: 0;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        margin: 3px 0 30px 0;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <div class="row">
            <div class="col-md-2">
            <input type="text" placeholder="Customer Name" id="txtCustomeName" name="txtCustomeName" class="form-control"/>        
            </div>
            <div class="col-md-2">
            <input type="button" name="btnSearch" id="btnSearch" class="btn btn-primary" style="background-color: blue;" value="Search"/>        
            </div>
           </div>   
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="tickets-container">
                        <ul class="tickets-list" id="ticketBody">

                            

                           
                        </ul>
                        <span id="pagination"></span>
                    </div>
                </div>


        </h2>
    </x-slot>

    <div class="py-12">

    </div>
</x-app-layout>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.js" integrity="sha512-vDRRSInpSrdiN5LfDsexCr56x9mAO3WrKn8ZpIM77alA24mAH3DYkGVSIq0mT5coyfgOlTbFyBSUG7tjqdNkNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="jsPages/ticketProcess.js" type="text/javascript"></script>