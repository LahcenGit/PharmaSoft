@extends('Layouts.master')

@section('content')
  <form action="{{url('/lot/insert/2')}}" method="POST" >
       {{csrf_field()}}
      <input  name="numLot" id="numLot">
      <input name="Qte" id="Qte">
      <input name="dateF" id="dateF" type="date">
      <input name="prixA" id="prixA" >
      <input name="dateP" id="dateP"  type="date" >
      <input name="prixV" id="prixV">
      <input type="submit"  value="Enregistrer">

  </form>
@stop