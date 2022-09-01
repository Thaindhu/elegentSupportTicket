<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css" integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">


        </h2>
        <div class="row col-md-12 mt-2">
            <div class="card col-md-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Ref No : {{$ref_no}} </strong></li>

                </ul>

                <div class="mb-3">

                    <input type="hidden" class="form-control" id="postid" name="postid" aria-describedby="company" value='{{$posts}}'>
                    <label for="company_name" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{$customer_name}}" id="frist_name" name="frist_name" aria-describedby="company_name" disabled>

                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Problem Description</label>
                    <textarea id="description" name="description" rows="4" class="form-control" disabled> {{$description}}
                    </textarea>

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value={{$email}} aria-describedby="emailHelp" disabled>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="phone" name="phone" value={{$phone_number}} aria-describedby="phone" disabled>

                </div>

                <div class="mb-3">

                </div>

            </div>

            <div class="card col-md-8">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Ref No : {{$ref_no}} </strong></li>

                </ul>
                <form id="reply-form">
                    {{ csrf_field() }}
                    <div class="mb-3">

                        <input type="hidden" class="form-control" id="postid" name="postid" aria-describedby="company" value='{{$posts}}'>

                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Reply</label>
                        <textarea id="reply" name="reply" rows="4" class="form-control">
                    </textarea>
                    <div class="col-sm-12 alert alert-danger print-error-msg1" style="display:none">
                            <ul></ul>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Replay send" class="btn btn-success" style="background-color: green" />
                    </div>
                </form>

                    <div class="mb-3">

                    </div>

            </div>

        </div>


    </x-slot>

    <div class="py-12">

    </div>
</x-app-layout>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.js" integrity="sha512-vDRRSInpSrdiN5LfDsexCr56x9mAO3WrKn8ZpIM77alA24mAH3DYkGVSIq0mT5coyfgOlTbFyBSUG7tjqdNkNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../jsPages/ticketProcess.js"></script>