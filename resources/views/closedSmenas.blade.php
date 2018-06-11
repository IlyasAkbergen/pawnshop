@extends('layouts.layout')

@section('style')

<link rel="stylesheet" href="{{asset('css/cash.css')}}">

@endsection

@section('content')

<div id="breadcrumbs" class="breadcrumbs">
   <span class="breadcrumb-crumb"><a href="/">Главная</a></span>
   <span class="breadcrumb-symbol">→</span>
   <span class="breadcrumb-crumb"><a href="/cash/">Касса</a></span>
   <span class="breadcrumb-symbol">→</span>
   <span class="breadcrumb-crumb">Закрытые смены</span>
</div>

<div class="wrp">
<h1 style="margin-bottom: 14px;">Закрытые смены</h1>
<div id="table_closed_cash" class="table-generator-ajax loaded" data-url="/cash/closed_cashes/table/">
   <div class="table-generator-filters cf"></div>
   <div class="generator-table-container">
      <table>
         <colgroup>
            <col style="width: 91px;" data-num="0" data-name="cash_number">
            <col style="width: 122px;" data-num="1" data-name="cash_date_open">
            <col style="width: 122px;" data-num="2" data-name="cash_date_close">
            <col style="width: 95px;" data-num="3" data-name="cash_sum_on_open">
            <col style="width: 95px;" data-num="4" data-name="cash_sum_on_close">
            <col style="width: 129px;" data-num="5" data-name="asset_pawn_shop">
            <col style="width: 129px;" data-num="6" data-name="asset_jewell">
            <col style="width: 129px;" data-num="7" data-name="asset_store">
            <col style="width: 129px;" data-num="8" data-name="asset_repair">
            <col style="width: 129px;" data-num="9" data-name="share_asset">
         </colgroup>
         <thead>
            <tr class="table-generator-headers">
               <th>
                  <span>Номер смены</span>
               </th>
               <th>
                  <span>Дата открытия</span>
               </th>
               <th>
                  <span>Дата закрытия</span>
               </th>
               <th>
                  <span>Сумма при открытии</span>
               </th>
               <th>
                  <span>Сумма при закрытии</span>
               </th>
               <th>
                  <span>Актив ломбарда</span>
               </th>
               <th>
                  <span>Актив аксессуаров</span>
               </th>
               <th>
                  <span>Актив комиссионного магазина</span>
               </th>
               <th>
                  <span>Актив ремонта</span>
               </th>
               <th>
                  <span>Общий актив</span>
               </th>
            </tr>
         </thead>
         <tbody class="">
         	@if(count($smenas) == 0)
	          <tr style="text-align:center">
	             <td colspan="4">
	                <div>Данные отсутствуют.</div>
	             </td>
	          </tr>
	        @else
	        	@foreach($smenas as $smena)
	            <tr>
	               <td class="">
	                  <a href="#smena_id={{$smena->id}}">{{$smena->id}}</a>
	               </td>
	               <td class="">
	                  {{$smena->started_at}}
	               </td>
	               <td class="">
	                  {{$smena->ended_at}}
	               </td>
	               <td class="numeric">
	                  {{$smena->before_cash}}
	               </td>
	               <td class="numeric">
	                  {{$smena->after_cash}}
	               </td>
	               <td class="numeric">
	                  хз что выводить
	               </td>
	               <td class="numeric">
	                  хз что выводить
	               </td>
	               <td class="numeric">
	                  хз что выводить
	               </td>
	               <td class="numeric">
	                  хз что выводить
	               </td>
	               <td class="numeric">
	                  хз что выводить
	               </td>
	            </tr>
	            @endforeach
            @endif
         </tbody>
      </table>
      <div class="fake-headers-container cf" style="position: absolute; z-index: 0;">
         <div class="header sortable " data-num="0" data-name="cash_number" title="Сортировать столбец 'Номер смены' по ВОЗРАСТАНИЮ" style="width: 91px;">
            <span>Номер смены</span>
         </div>
         <div class="header sortable desc" data-num="1" data-name="cash_date_open" title="Сортировать столбец 'Дата открытия' по ВОЗРАСТАНИЮ" style="width: 122px;">
            <span>Дата открытия</span>
         </div>
         <div class="header sortable " data-num="2" data-name="cash_date_close" title="Сортировать столбец 'Дата закрытия' по ВОЗРАСТАНИЮ" style="width: 122px;">
            <span>Дата закрытия</span>
         </div>
         <div class="header sortable " data-num="3" data-name="cash_sum_on_open" title="Сортировать столбец 'Сумма при открытии' по ВОЗРАСТАНИЮ" style="width: 95px;">
            <span>Сумма при открытии</span>
         </div>
         <div class="header sortable " data-num="4" data-name="cash_sum_on_close" title="Сортировать столбец 'Сумма при закрытии' по ВОЗРАСТАНИЮ" style="width: 95px;">
            <span>Сумма при закрытии</span>
         </div>
         <div class="header sortable " data-num="5" data-name="asset_pawn_shop" title="Сортировать столбец 'Актив ломбарда' по ВОЗРАСТАНИЮ" style="width: 129px;">
            <span>Актив ломбарда</span>
         </div>
         <div class="header sortable " data-num="6" data-name="asset_jewell" title="Сортировать столбец 'Актив аксессуаров' по ВОЗРАСТАНИЮ" style="width: 129px;">
            <span>Актив аксессуаров</span>
         </div>
         <div class="header sortable " data-num="7" data-name="asset_store" title="Сортировать столбец 'Актив комиссионного магазина' по ВОЗРАСТАНИЮ" style="width: 129px;">
            <span>Актив комиссионного магазина</span>
         </div>
         <div class="header sortable " data-num="8" data-name="asset_repair" title="Сортировать столбец 'Актив ремонта' по ВОЗРАСТАНИЮ" style="width: 129px;">
            <span>Актив ремонта</span>
         </div>
         <div class="header sortable " data-num="9" data-name="share_asset" title="Сортировать столбец 'Общий актив' по ВОЗРАСТАНИЮ" style="width: 129px;">
            <span>Общий актив</span>
         </div>
      </div>
      <div class="resizers-container" style="position: absolute; z-index: 1;">
         <div class="resizer" style="left: 91px;" data-num="0"></div>
         <div class="resizer" style="left: 213px;" data-num="1"></div>
         <div class="resizer" style="left: 335px;" data-num="2"></div>
         <div class="resizer" style="left: 430px;" data-num="3"></div>
         <div class="resizer" style="left: 525px;" data-num="4"></div>
         <div class="resizer" style="left: 654px;" data-num="5"></div>
         <div class="resizer" style="left: 783px;" data-num="6"></div>
         <div class="resizer" style="left: 912px;" data-num="7"></div>
         <div class="resizer" style="left: 1041px;" data-num="8"></div>
         <div class="resizer" style="left: 1170px;" data-num="9"></div>
      </div>
   </div>
   <div id="mainpage_footer" class="table-generator-footer cf">
      <div class="pagination">
         <form>
            <div class="row1">Выведено <b>1</b> из <b>1</b></div>
            <div class="row2">
               (← Ctrl) <span class="table-generator-f-prev link-action ">Предыдущая</span>
               <select name="_page">
                  <option selected="" value="0">1</option>
               </select>
               <span class="table-generator-f-next link-action ">Следующая</span> (Ctrl →)
               <div class="table-generator-settings">
                  <span class="link-action table-settings-show active">Настройки таблицы</span>
               </div>
               <div class="table-generator-limit">
                  На странице:
                  <select name="_limit">
                     <option selected="" value="20">20</option>
                     <option value="30">30</option>
                     <option value="40">40</option>
                     <option value="50">50</option>
                     <option value="100">100</option>
                     <option value="500">500</option>
                  </select>
               </div>
            </div>
         </form>
      </div>
      <div class="download-xls-container">
      </div>
   </div>
</div>
</div>

@endsection