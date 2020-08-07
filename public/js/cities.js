var city = document.querySelector('#state');
  city.addEventListener('change', (e)=>{
    fetchReferer(e.target.value);
    
  });
  var renderReferer = (parent, data)=>{

    var option_select = document.createElement('option');
    option_select.disabled  = true;
    option_select.innerHTML = ' -- Choose City --';
    parent.append(option_select);

    for (var i = 0; i < data.length; i++) {
      var option = document.createElement('option');
      //option.className = 'c-black';  
      option.value = data[i].city_id;
      option.innerHTML = `${data[i].city_name} `;
      parent.append(option);
    }
  }
  var fetchReferer = (param)=>{
    var ajax;
    var city= document.querySelector('#city');
    city.innerHTML = `<option disabled >-- loading --</option>`;
      try{
        ajax = new XMLHttpRequest();
      }catch(e){
        console.log("Only Standardized used");
      }
      ajax.onreadystatechange = function(){ 
        if(ajax.readyState == 4){
          //console.log(JSON.parse(ajax.responseText));
            try{
              var result = JSON.parse(ajax.responseText);
              
              city.innerHTML = '';
              renderReferer(city, result);
            }catch(e){
              console.log(e);
            }
            
            
        }
      }
      ajax.upload.addEventListener('progress', function(e){
        
      } ,false);

      ajax.open("GET", 'home/cities/'+param, true);
      ajax.send();
    }
   