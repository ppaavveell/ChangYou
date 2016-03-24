
<script type="text/javascript">
    function show_dist()
    {
      var mkad = document.getElementById('mkad').checked;
      if(mkad) document.getElementById('dist').style.display = '';
      else document.getElementById('dist').style.display = 'none';
    }

    function show(e, entity)
    {
      // console.log(e,entity);
      var entity = document.getElementById(entity);
      var need_show = document.getElementById(e).checked;
      var elems = entity.getElementsByTagName('div');
      for (var i = 0; i < elems.length; i++)
      {
        if(need_show == true) elems[i].style.display = '';
        else elems[i].style.display = 'none';
      }

      if(entity == winds ) move();
    }

    function move()
    {
      var need_window = document.getElementById('need_window');
      var need_chemi = document.getElementById('chem');
      var window_size = document.getElementById('winds').style.height;
     if(need_window.checked == true) need_chemi.style.bottom = '-' + window_size;
      else need_chemi.style.bottom = '0px'
      // console.log( window_size);
      // console.log( need_chemi.style.bottom);
    }


    function plus(e, ee)
    {
      var val = e;
      var movie = ee;
      var kol = 0;
      kol = document.getElementById(val).value;

      if(movie == 'plus') kol++;
      else
        if(kol > 0) kol--;
      document.getElementById(val).value = kol;

    }

    function calculate(e)
    {
      // console.log(e);
      var res_count = document.getElementById('res_count');
      document.getElementById('res_count').style.display = '';
      // console.log(document.getElementById('res_count').style.display);
      res_count.innerHTML = 'Общая стоимость ';
      if(document.getElementById('area_id').value == 'Квартира - Коттедж')
      {
        if(document.getElementById('type_clean').value == 'Генеральная')
        {
          document.getElementById('area_value').style.display = 'none';
          document.getElementById('kol_k').style.display = '';
          switch(e)
          {
            case '1' :
              res_count.innerHTML = res_count.innerHTML + 3500;
              break;
            case '2' :
              res_count.innerHTML = res_count.innerHTML + 4500;
              break;
            case '3' :
              res_count.innerHTML = res_count.innerHTML + 5500;
              break;
            case '4' :
              res_count.innerHTML = res_count.innerHTML + 6500;
              break;
          }
         }
          if(document.getElementById('type_clean').value == 'Экспресс')
          {
            document.getElementById('area_value').style.display = 'none';
            document.getElementById('kol_k').style.display = '';
            switch(e)
            {
              case '1' :
                res_count.innerHTML = res_count.innerHTML + 2500;
                break;
              case '2' :
                res_count.innerHTML = res_count.innerHTML + 3000;
                break;
              case '3' :
                res_count.innerHTML = res_count.innerHTML + 3500;
                break;
              case '4' :
                res_count.innerHTML = res_count.innerHTML + 4000;
                break;
            }
          }

          if(document.getElementById('type_clean').value == 'После строительных работ')
          {

            document.getElementById('area_value').style.display = '';
            document.getElementById('kol_k').style.display = 'none';
          }


      }
  }



    window.onload = function()
    {
      calculate('2');
    }



    function area(e)
    {
      var area_id = e;
      switch(area_id)
      {
        case 'Квартира - Коттедж':
          document.getElementById('area_value').style.display = 'none';
          document.getElementById('kol_k').style.display = '';
          break;
        case 'Дом':
          document.getElementById('area_value').style.display = '';
          document.getElementById('kol_k').style.display = 'none';
          break;
        case 'Таунхаус':
          document.getElementById('area_value').style.display = '';
          document.getElementById('kol_k').style.display = 'none';
          break;
      }

      var kol_kom = document.getElementById('kol_k');
      var count;
      var elems_radio = kol_kom.getElementsByTagName('input');
      console.log(elems_radio);
      for (var jj = 0; jj < elems_radio.length; jj++)
      {
        console.dir(elems_radio[jj].checked);
        // console.dir(elems_radio[jj]);
        if(elems_radio[jj].checked == true) count = elems_radio[jj].value;
      }

      calculate(count);

    }
</script>