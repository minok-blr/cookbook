@include('head')
@include('header')

<h1 style="text-align: center" class="pt-3">Welcome to the profile page!</h1>
<hr>

<div>
    <div>
        Name: {{auth()->user()->name}}
    </div>
    <br/>
    <div>
        Email: {{auth()->user()->email}}
    </div>

</div>
