@extends('layouts.page')
@section('content')

<!-- Helpers. IGNORE THEM-->
<!-- Actual HTML (you are only interested in this):-->
<main>
  <div class="content">
    <h1 class="text-title">Dashboard D'ouverture</h1>
    <div class="filters">
      <input onkeyup="search_marche()" id="search_marche" class="search" placeholder="Recherche..."/>
    </div>
    <div id="cards" class="cards">
      @foreach ($Marches as $Marche)
      <a href="">
        <div  class="card"><span class="card-code">#Marche{{$Marche->id}}</span>
          <h2 class="card-title">{{$Marche->title}}</h2>
          <div class="card-tags">
            <div class="card-tag tag-{{$Marche->etat_id}}">{{$Marche->etat}}</div>
            @isset($nbr_postulations[$Marche->id])
              <div class="card-tag tag-1">{{$nbr_postulations[$Marche->id]}} Postulations</div>
            @else
              <div class="card-tag tag-1">0 Postulations</div>
            @endisset
          </div>
          <span class="card-description">{{$Marche->description}}</span>
          <span class="card-footer">Date Limite : {{$Marche->limit_date}}</span>
          <span class="card-footer_1">{{$currentTime->diffInDays($Marche->limit_date)}} Jours</span>
      </div> 
    </a> 
      @endforeach
    </div>
  </div>
</main>

<style>
    main div, main div * {
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
    color: #444;
    font-family: sans-serif;
    font-size: 16px;
    line-height: 1.5;
    }
    .topbar {
    height: 40px;
    background-color: #dee4ee;
    padding-left: 16px;
    padding-right: 16px;
    align-items: center;
    flex-direction: row;
    }
    .content {
    background-color: #eef1f6;
    padding-left: 16px;
    padding-right: 16px;
    padding-top: 32px;
    padding-bottom: 32px;
    }
    .notification {
    background-color: #dcd0fe;
    padding: 16px;
    border: 1px solid #cbb9fe;
    margin-bottom: 32px;
    }
    .search {
    border: 1px solid rgba(0,0,0,0.2);
    padding-left: 15px;
    padding-right: 15px;
    }
    .cards {
    flex-direction: row;
    flex-wrap: wrap;
    margin-left: -16px;
    }
    .card {
    margin-left: 16px;
    margin-top: 16px;
    padding: 16px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
    min-width: 260px;
    max-width: 420px;
    flex: 1;
    }
    .card-code{
      color: rgb(146, 146, 146);
      font-size: 0.9em;
    }
    .card-title {
    line-height: 1;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    }
    .card-tags {
    flex-direction: row;
    flex-wrap: wrap;
    margin-left: -8px;
    }
    .card-tag {
    margin-top: 8px;
    margin-left: 8px;
    font-size: 12px;
    font-weight: 500;
    padding-left: 4px;
    padding-right: 4px;
    border-radius: 8px;
    }
    .card-tag.tag-1 {
    background-color: #feecdb;
    border: 2px solid #fee5cd;
    color: #fdad62;
    }
    .card-tag.tag-2 {
    background-color: #fce0eb;
    border: 2px solid #fad4e4;
    color: #ef72a6;
    }
    .card-tag.tag-3 {
    background-color: #dfecea;
    border: 2px solid #d2e4e1;
    color: #8bbbb2;
    }
    .card-tag.tag-4 {
    background-color: #f3ebf0;
    border: 2px solid #eee2e9;
    color: #c69eb6;
    }
    .card-tag.tag-5 {
    background-color: #feecdb;
    border: 2px solid #fee5cd;
    color: #fdad62;
    }
    .card-tag.tag-6 {
    background-color: #fce0eb;
    border: 2px solid #fad4e4;
    color: #ef72a6;
    }
    .card-tag.tag-7 {
    background-color: #dfecea;
    border: 2px solid #d2e4e1;
    color: #8bbbb2;
    }
    .card-tag.tag-8 {
    background-color: #f3ebf0;
    border: 2px solid #eee2e9;
    color: #c69eb6;
    }
    .card-tag.tag-9 {
    background-color: #feecdb;
    border: 2px solid #fee5cd;
    color: #fdad62;
    }
    .card-tag.tag-10 {
    background-color: #fce0eb;
    border: 2px solid #fad4e4;
    color: #ef72a6;
    }
    .card-tag.tag-11 {
    background-color: #dfecea;
    border: 2px solid #d2e4e1;
    color: #8bbbb2;
    }
    .card-tag.tag-12 {
    background-color: #f3ebf0;
    border: 2px solid #eee2e9;
    color: #c69eb6;
    }
    .card-description {
    padding-top: 8px;
    border-top: 1px solid rgba(0,0,0,0.1);
    margin-top: 16px;
    font-size: 14px;
    color: #999;
    }
    .card-footer {
    padding-top: 4px;
    border-top: 1px solid rgba(0,0,0,0.1);
    margin-top: 16px;
    font-size: 0.7em;
    color: #999;
    }
    .card-footer_1 {
    font-size: 0.7em;
    background-color: #00cf91;
    border: 2px solid #00704b;
    color: #006b39;
    text-align: center
    }
    .text-title{
      font-size: 1.8em;
      text-align: center
    }
</style>
<script>
    function search_marche() {
      // Declare variables
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById('search_marche');
      filter = input.value.toUpperCase();
      ul = document.getElementById("cards");
      li = ul.getElementsByClassName("card");
      
      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("span")[0];
        txtValue = a.textContent || a.innerText;

        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
</script>
@endsection