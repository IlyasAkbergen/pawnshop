@extends('layouts.layout')

@section('style')
  <link rel="stylesheet" href="{{asset('css/klients.css')}}">
@endsection

@section('content')
  <div class="container" id="main">
   <div class="row">
      
      <div class="col-sm-12" id="direct">
        <p><a>Главная </a>→Клиенты</p>
         <h3>Наши клиенты</h3>
      </div> 

      <div class="col-sm-12" id="action">
         
            <div class="panel panel-primary">
        
          <div class="panel-body">
            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
              <tr>
                <th>Фио</th>
                <th>Дата рождение</th>
                <th>Документ</th>
                <th>Серия/номер</th>
                 <th>Место жительство</th>
                 <th>Телефон</th>
              </tr>
            </thead>
            <tbody>

               
             @foreach ($klients as $klient)
              <tr>
               
                <td><a href="/klient/{{$klient->id}}">{{$klient->name }} {{$klient->surname }} {{$klient->patronymic}}</a></td>
                <td>{{$klient->date_of_birth}}</td>
                <td>Документ</td>
                <td>539255</td>
                <td>{{$klient->location_of_birth}}</td>
                 <td>{{$klient->phone}}</td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
          
      </div>  
   </div>


 </div>
@endsection

@section('script')
  <script type="text/javascript">
  /**
*   I don't recommend using this plugin on large tables, I just wrote it to make the demo useable. It will work fine for smaller tables 
*   but will likely encounter performance issues on larger tables.
*
*   <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
*   $(input-element).filterTable()
*   
* The important attributes are 'data-action="filter"' and 'data-filters="#table-selector"'
*/
(function(){
    'use strict';
  var $ = jQuery;
  $.fn.extend({
    filterTable: function(){
      return this.each(function(){
        $(this).on('keyup', function(e){
          $('.filterTable_no_results').remove();
          var $this = $(this), 
                        search = $this.val().toLowerCase(), 
                        target = $this.attr('data-filters'), 
                        $target = $(target), 
                        $rows = $target.find('tbody tr');
                        
          if(search == '') {
            $rows.show(); 
          } else {
            $rows.each(function(){
              var $this = $(this);
              $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
            })
            if($target.find('tbody tr:visible').size() === 0) {
              var col_count = $target.find('tr').first().find('td').size();
              var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
              $target.find('tbody').append(no_results);
            }
          }
        });
      });
    }
  });
  $('[data-action="filter"]').filterTable();
})(jQuery);

$(function(){
    // attach table filter plugin to inputs
  $('[data-action="filter"]').filterTable();
  
  $('.container').on('click', '.panel-heading span.filter', function(e){
    var $this = $(this), 
      $panel = $this.parents('.panel');
    
    $panel.find('.panel-body').slideToggle();
    if($this.css('display') != 'none') {
      $panel.find('.panel-body input').focus();
    }
  });
  $('[data-toggle="tooltip"]').tooltip();
})
</script>
@endsection