@extends('layouts.courses')

@section('title', 'Smart Contract Development')

@section('courseHeader')
    <h1>Become Smart Contract Developer</h1>
    <p class="subtitle" style="color:#fff;">Prepare for a data science career. Learn to use Python, R, SQL, and Tableau to uncover insights, communicate critical findings, and create data-driven solutions.</p>
    <p>Enrollment date <b>coming soon</b></p>
@endsection

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson 1:</span>
        <span>Installing Solidity</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        <li><a class="list-group-item active" href="">1. Installing Solidity & Ethereum Wallet</a></li>
        <li><a class="list-group-item" href="">2. Solidity Source Files & Structure of Smart Contracts</a></li>
        <li><a class="list-group-item" href="">3. Variables & Functions</a></li>
        <li><a class="list-group-item" href="">4. Arithmetic, Logical & Bitwise Operators</a></li>
        <li><a class="list-group-item" href="">5. Input Parameters and Output Parameters</a></li>
        <li><a class="list-group-item" href="">6. Importing Smart Contracts & Compiling Contracts</a></li>
        <li><a class="list-group-item" href="">7. Events & Logging</a></li>
        <li><a class="list-group-item" href="">8. Exceptions</a></li>
        <li><a class="list-group-item" href="">9. Examples</a></li>
    </ul>
@endsection