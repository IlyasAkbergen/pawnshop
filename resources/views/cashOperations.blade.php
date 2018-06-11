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
   <span class="breadcrumb-crumb">Кассовые операции</span>
</div>
<div class="wrp">
   <h1 style="margin-bottom: 14px;">Кассовые операции</h1>
   <div id="own_needs_ops" class="table-generator-ajax loaded" data-url="/cash/own_needs/table/">
      <div class="table-generator-filters cf">
         <form>
            <div class="table-generator-filter">
               <label>
                  Сотрудники: 
                  <select name="accounts_filter" id="accounts_filter_id" style="width: auto;">
                     <option value="0" selected="">Все сотрудники</option>
                     <optgroup label="Действующие сотрудники">
                        @foreach($employees as $emp)
                        <option value="{{$emp->id}}">{{$emp->email}}</option>
                        @endforeach
                     </optgroup>
                     <optgroup label="Уволенные сотрудники"></optgroup>
                  </select>
               </label>
            </div>
            <div class="table-generator-filter">
               <label>
                  Вид операции: 
                  <select name="cash_filter" id="cash_filter_id">
                     <option value="0" selected="">Все кассовые операции</option>
                     <option value="49">Приход</option>
                     <option value="50">Расход</option>
                  </select>
               </label>
            </div>
            <div class="table-generator-filter separator"></div>
            <div class="table-generator-filter">
               <div>Дата операции c <input type="text" name="filter_date_min" id="filter_date_min" value="" class="filter_date_min datepicker hasDatepicker"> по <input type="text" name="filter_date_max" id="filter_date_max" class="filter_date_max datepicker hasDatepicker" value=""></div>
            </div>
            <div class="table-generator-filter separator"></div>
         </form>
      </div>
      <div class="generator-table-container">
         <table>
            <colgroup>
               <col style="width: 140px;" data-num="0" data-name="date_utc">
               <col style="width: 128px;" data-num="1" data-name="type_operation">
               <col style="width: 105px;" data-num="2" data-name="price">
               <col style="width: 285px;" data-num="3" data-name="temp">
               <col style="width: 218px;" data-num="4" data-name="person">
               <col style="width: 188px;" data-num="5" data-name="acc_name">
               <col style="width: 106px;" data-num="6" data-name="functions">
            </colgroup>
            <thead>
               <tr class="table-generator-headers">
                  <th>
                     <span>Дата, время</span>
                  </th>
                  <th>
                     <span>Вид</span>
                  </th>
                  <th>
                     <span>Сумма</span>
                  </th>
                  <th>
                     <span>Основание</span>
                  </th>
                  <th>
                     <span>От кого/кому</span>
                  </th>
                  <th>
                     <span>Сотрудник</span>
                  </th>
                  <th>
                     <span>Функции</span>
                  </th>
               </tr>
            </thead>
            <?php 
               $types = array("приход","расход","приход (доход)","расход (затраты)");
             ?>
            <tbody class="">
               @foreach($operations as $operation)
               <tr>
                  <td class="">
                     {{$operation->created_at}}
                  </td>
                  <td class="">
                     {{$types[$operation->type]}}
                  </td>
                  <td class="numeric">
                     {{$operation->sum}}
                  </td>
                  <td class="">
                     {{$operation->description}}
                  </td>
                  <td class="">
                  </td>
                  <td class="">
                     {{ App\User::find($operation->user_id)->email }}
                  </td>
                  <td class="">
                     <div class="control_op_forms"><a href="/blanks/?oid=10&amp;backurl=/cash/own_needs/" class="print_button_img"><img title="Печать документов" src="/img/print_icon.png"></a></div>
                  </td>
               </tr>
               @endforeach
               <tr class="sum-rows" title="Итого для 4">
                  <td></td>
                  <td></td>
                  <td class="numeric">{{$sum}}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
            </tbody>
         </table>
         <div class="fake-headers-container cf" style="position: absolute; z-index: 0;">
            <div class="header sortable desc" data-num="0" data-name="date_utc" title="Сортировать столбец 'Дата, время' по ВОЗРАСТАНИЮ" style="width: 140px;">
               <span>Дата, время</span>
            </div>
            <div class="header sortable " data-num="1" data-name="type_operation" title="Сортировать столбец 'Вид' по ВОЗРАСТАНИЮ" style="width: 128px;">
               <span>Вид</span>
            </div>
            <div class="header sortable " data-num="2" data-name="price" title="Сортировать столбец 'Сумма' по ВОЗРАСТАНИЮ" style="width: 105px;">
               <span>Сумма</span>
            </div>
            <div class="header sortable " data-num="3" data-name="temp" title="Сортировать столбец 'Основание' по ВОЗРАСТАНИЮ" style="width: 285px;">
               <span>Основание</span>
            </div>
            <div class="header sortable " data-num="4" data-name="person" title="Сортировать столбец 'От кого/кому' по ВОЗРАСТАНИЮ" style="width: 218px;">
               <span>От кого/кому</span>
            </div>
            <div class="header sortable " data-num="5" data-name="acc_name" title="Сортировать столбец 'Сотрудник' по ВОЗРАСТАНИЮ" style="width: 188px;">
               <span>Сотрудник</span>
            </div>
            <div class="header  " data-num="6" data-name="functions" title="Функции" style="width: 106px;">
               <span>Функции</span>
            </div>
         </div>
         <div class="resizers-container" style="position: absolute; z-index: 1;">
            <div class="resizer" style="left: 140px;" data-num="0"></div>
            <div class="resizer" style="left: 268px;" data-num="1"></div>
            <div class="resizer" style="left: 373px;" data-num="2"></div>
            <div class="resizer" style="left: 658px;" data-num="3"></div>
            <div class="resizer" style="left: 876px;" data-num="4"></div>
            <div class="resizer" style="left: 1064px;" data-num="5"></div>
            <div class="resizer" style="left: 1170px;" data-num="6"></div>
         </div>
      </div>
      <div id="mainpage_footer" class="table-generator-footer cf">
         <div class="pagination">
            <form>
               <div class="row1">Выведено <b>4</b> из <b>4</b></div>
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