@extends('layouts.courses')

@section('title', 'Blockchain Basics')

@section('courseHeader')
    <h1>Learn Blockchain Basics</h1>
    <p class="subtitle" style="color:#fff;">Prepare for a data science career. Learn to use Python, R, SQL, and Tableau to uncover insights, communicate critical findings, and create data-driven solutions.</p>
    <p>Enrollment date <b>coming soon</b></p>
@endsection

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson 1:</span>
        <span>What is blockchain?</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        <li><a class="list-group-item active" href="">1. What is blockchain?</a></li>
        <li><a class="list-group-item" href="">2. How does blockchain network work?</a></li>
        <li><a class="list-group-item" href="">3. Understanding the blocks in a Blockchain</a></li>
        <li><a class="list-group-item" href="">4. The Economics of Blockchain</a></li>
        <li><a class="list-group-item" href="">5. The Business of Blockchain</a></li>
    </ul>
@endsection