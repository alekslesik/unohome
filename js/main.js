
document.addEventListener('DOMContentLoaded', function()
{

  // requestAnimationFrame

  (function() 
  {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] 
                                || window[vendors[x]+'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function() { callback(currTime + timeToCall); }, 
            timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };

    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
  }());

  // Полифилл forEach

  if (typeof window !== 'undefined' &&  window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = function (callback, thisArg) {
        if(!thisArg)
        {
          thisArg = window;
        }
        for (var i = 0; i < this.length; i++) {
            callback.call(thisArg, this[i], i, this);
        }
    };
  }


  // Полифилл DOM-parser 

  (function(DOMParser) {
    "use strict";

    var proto = DOMParser.prototype,
    nativeParse = proto.parseFromString;

    // Firefox/Opera/IE throw errors on unsupported types
    try {
      // WebKit returns null on unsupported types
      if ((new DOMParser()).parseFromString("", "text/html")) {
        // text/html parsing is natively supported
        return;
      }
    } catch (ex) {}

    proto.parseFromString = function(markup, type) {
      if (/^\s*text\/html\s*(?:;|$)/i.test(type)) {
        var
          doc = document.implementation.createHTMLDocument("");
              if (markup.toLowerCase().indexOf('<!doctype') > -1) {
                doc.documentElement.innerHTML = markup;
              }
              else {
                doc.body.innerHTML = markup;
              }
        return doc;
      } else {
        return nativeParse.apply(this, arguments);
      }
    };
  }(DOMParser));

  // Получение svg-кода 

  var imgSvg = document.querySelectorAll('.img-svg');

  if(imgSvg.length)
  {
    for(var i = 0; i < imgSvg.length; i++)
    {
        var img = imgSvg[i];
        var imgClass = img.getAttribute('class');
        var imgUrl = img.getAttribute('src');

        var request = new XMLHttpRequest();
        request.open('GET', imgUrl, false);

        request.onload = function() {
            if (this.status >= 200 && this.status < 400) {
              // Success!
              var data = this.response;
              var parser = new DOMParser();
              var htmlSvg = parser.parseFromString(data, 'text/html');
              var svg = htmlSvg.querySelector('svg');

              svg.setAttribute('class', 'img-svg');
              // console.log(svg);

              // img.replaceWith(svg);
              img.parentElement.insertBefore(svg, img);
              img.parentElement.removeChild(img);
              
            }
            else 
            {
              // console.log('error!');
            }
          };
          
          request.onerror = function(e) {
            console.log(e);
            // There was a connection error of some sort
          };
          
          request.send();
    }
  }

  function getMaxHeight(array)
  {
    let max = array[0].scrollHeight;
    for (var i = 0; i < array.length; i++) 
    { 
      if (max < array[i].scrollHeight) 
      {
        max = array[i].scrollHeight; 
      }
    }
    return max;
  }

  // var otherServicesBlockContent = document.querySelectorAll('.other-services-block-content');

  // if(otherServicesBlockContent.length)
  // {
  //   var maxHeight = getMaxHeight(otherServicesBlockContent);

  //   otherServicesBlockContent.forEach(function(elem, index)
  //   {
  //     elem.style.height = maxHeight + 50 + 'px';
  //   });
  // }

  // Определение прокрутки шапки и задание фиксированной шапки

  var header = document.querySelector('.header');
  var headerTopHeight = document.querySelector('.header-top').scrollHeight;
  var headerMiddleHeight = document.querySelector('.header-middle').scrollHeight;
  var headerMiddle = document.querySelector('.header-middle');
  var headerBottom =  document.querySelector('.header-bottom');
  var summHeight = headerTopHeight + headerMiddleHeight;
  // console.log(summHeight);

  function fixedAdaptiveHeader(block, height)
  {
    var scroll = window.pageYOffset || document.documentElement.scrollTop;
    var heightBlock = block.clientHeight;
    var wrapperContent = document.querySelector('.wrapper-content');
      
    if (scroll >= height) 
    {
      block.classList.add('header_fixed');
      wrapperContent.style.paddingTop = heightBlock + 'px';
    } 
    else 
    {
      block.classList.remove('header_fixed');
      wrapperContent.style.paddingTop = '0px';
    }
  }


  var headerMenuList = document.querySelector('.header-menu-list');
  var widthHeaderMenuList = document.querySelector('.header-menu-list').offsetWidth;

  var additionalServices = document.querySelector('.additional-services');
  var moreMenuItems = document.querySelectorAll('.additional-services li');

  // console.log(widthHeaderMenuList);

  function getPosition(element, parentElement)
  {
    var positionParentElement = parentElement.getBoundingClientRect();
    var positionElement = element.getBoundingClientRect();

    return positionElement.left + element.offsetWidth - positionParentElement.left;
  }

  function transferMenuItems()
  {
    var headerMenuItems = document.querySelectorAll('.header-menu__item');

    headerMenuItems.forEach(function(item, index)
    {
      var coords = getPosition(item, headerMenuList);
      // console.log(coords);

      if(coords > widthHeaderMenuList)
      {
        // console.log(true);
        item.style.display = 'none';
        additionalServices.style.display = 'block';
        moreMenuItems[index].style.display = 'block';
      }

    });

  }


  // if(window.matchMedia('(min-width: 768px)').matches)
  // {
  //   // Задание максимальной высоты 

  //   var servicesContentBlock = document.querySelectorAll('.services-content-block');

  //   if(servicesContentBlock.length)
  //   {
  //     var maxHeight = getMaxHeight(servicesContentBlock);

  //     servicesContentBlock.forEach(function(elem, index)
  //     {
  //       elem.style.height = maxHeight + 50 + 'px';
  //     });
  //   }
  // }

  if(window.matchMedia('(min-width: 940px)').matches)
  {
    window.addEventListener('scroll', function()
    {
      fixedAdaptiveHeader(headerBottom, summHeight);
    });

    transferMenuItems();

    window.addEventListener('resize', transferMenuItems);
  }

  if(window.matchMedia('(max-width: 939px)').matches)
  {
    window.addEventListener('scroll', function()
    {
      fixedAdaptiveHeader(headerMiddle, 40);
    });
  }

  if(window.matchMedia('(max-width: 619px)').matches)
  {
    var submitSearch = document.querySelectorAll('.form-search input[type="submit"]');
    if(submitSearch.length)
    {
      submitSearch.forEach(function(button)
      {
        button.value = '';
      });
    }
  }

  // Аккордеон 

  var faqBlock = document.querySelectorAll('.faq-block');

  if(faqBlock.length)
  {
    faqBlock.forEach(function(elem, index)
    {
      elem.addEventListener('click', function()
      {
        var lines = elem.querySelectorAll('.faq-block-question__button span');
        // console.log(lines);
        var verticalLine = lines[1];
        verticalLine.classList.toggle('hidden');
        elem.querySelector('.faq-block__answer').classList.toggle('show');
      });
    });
  }

  // Раскрытие подменю услуг в sidebar

  var buttonInnerServices = document.querySelectorAll('.button-inner-services');

  if(buttonInnerServices.length)
  {
    buttonInnerServices.forEach(function(button)
    {
      button.addEventListener('click', function()
      {
        button.classList.toggle('button-inner-services_active');
        var parent = button.parentElement;
        parent.querySelector('.list-inner-services').classList.toggle('list-inner-services_active');
      });
    });
  }

  // Лицензии

  var licensesContentBlock = document.querySelectorAll('.licenses-content-block');

  if(licensesContentBlock.length)
  {
    var tobii = new Tobii({
      zoom: false,
      nav: false,
      draggable: false,
      counter: false
    });
  }

  // Табы 

  var tabs = document.querySelectorAll('.tabs');

  if(tabs.length)
  {
    tabs.forEach(function(elem, index)
    {
      var tabsItem = elem.querySelectorAll('.tabs-item');
      var tabsContent = elem.querySelector('.tabs-content');
      var tabsItems = elem.querySelector('.tabs-items')

      tabsItem.forEach(function(elem, index)
      {
        elem.addEventListener('click', function(e)
        {
          e.preventDefault();
          if(!elem.classList.contains('tabs-item_active'))
          {
            // var prevDataTab = tabsItems.querySelector('.tabs-item_active').dataset.tab;
            tabsItems.querySelector('.tabs-item_active').classList.remove('tabs-item_active');
            elem.classList.add('tabs-item_active');
            var dataTab = elem.dataset.tab;
            tabsContent.querySelector('.tabs-content-block_active').classList.remove('tabs-content-block_active');
            tabsContent.querySelector('div[data-tab="' + dataTab + '"]').classList.add('tabs-content-block_active');
          }
        });
      });
    });
  }


  // Появление выпадающего меню 

  var dropdownMenu = document.querySelector('.dropdown');
  var burgerMenu = document.querySelector('.burger-menu');
  var shadow = document.querySelector('.wrapper-shadow');

  burgerMenu.addEventListener('click', function(e)
  {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    // console.log(scrollTop);

    if(scrollTop === 0)
    {
      dropdownMenu.style.top = summHeight + 'px';
      dropdownMenu.style.height = 'calc(100vh - ' + summHeight + 'px)';
    }
    else 
    {
      if(headerMiddle.classList.contains('header_fixed'))
      {
        dropdownMenu.style.top = headerMiddleHeight + 'px';
        dropdownMenu.style.height = 'calc(100vh - ' + headerMiddleHeight + 'px)';
      }
      else 
      {
        var headerMiddleSizes = headerMiddle.getBoundingClientRect();
        dropdownMenu.style.height = (window.innerHeight - (headerMiddleSizes.top + headerMiddleSizes.height)) + 'px';
        dropdownMenu.style.top = headerMiddleSizes.top + headerMiddleSizes.height + 'px';
      }
    }

    e.preventDefault();
    this.classList.toggle('burger-menu_active');
    dropdownMenu.classList.toggle('dropdown_active');
    // shadow.classList.toggle('wrapper-shadow_active');
    document.body.classList.toggle('disabled');

  });

  // Адаптив для таблиц 

  var tables = document.querySelectorAll('table');

  if(tables.length)
  {
    tables.forEach(function(table)
    {
      table.insertAdjacentHTML('beforebegin', '<div class="wrapper-table"></div>');
      let wrapperTable = table.previousElementSibling;
      wrapperTable.appendChild(table);
    });
  }

  // if(tables.length)
  // {
  //   tables.forEach(function(table) 
  //   {
  //     if(table.classList.contains('data-table')) return;

  //     var headers = table.querySelectorAll('th');
  //     var strBody = table.querySelectorAll('tr');
      
  //     strBody.forEach(function(str)
  //     {
  //       var columns = str.querySelectorAll('td');

  //       for(var i = 0; i < columns.length; i++)
  //       {
  //         if(headers[i].querySelector('p'))
  //         {
  //           columns[i].dataset.label = headers[i].querySelector('p').innerHTML;
  //         }
  //         else 
  //         {
  //           columns[i].dataset.label = headers[i].innerHTML;
  //         }
  //       }
  //     });
  //   });
  // }


  // Поиск

  var buttonSearch = document.querySelectorAll('.button-search');
  var search = document.querySelector('.search');

  if(buttonSearch.length)
  {
    if(window.matchMedia('(min-width: 940px)').matches)
    {
      buttonSearch.forEach(function(button)
      {
        button.addEventListener('click', function(e)
        {
          e.preventDefault();

          search.classList.add('search_active');
        
          search.querySelector('.search__close').addEventListener('click', function(e)
          {
            e.preventDefault();

            search.classList.remove('search_active');
            shadow.classList.remove('wrapper-shadow_active');

          });

        });
      });
    }
  }

  // Кастомизированный селект

  var elemsSelect = document.querySelectorAll('.custom-select');

  if(elemsSelect.length)
  {
    elemsSelect.forEach(function(elem)
    {
      new Choices(elem, {
        choices: [],
        placeholder: true,
        searchEnabled: false,
        itemSelectText: ''
      });
    });
  }


  // Для input[type="file"]

  var inputFile = document.querySelectorAll('input[type="file"]');

  if(inputFile.length)
  {
      inputFile.forEach(function(input) 
      {
          input.addEventListener('change', function(e)
          {
              var value = input.value;
              value = value.replace( 'C:\\fakepath\\', '');
              input.parentElement.querySelector('.file-upload__name').innerHTML = value;
          });
      });
  }

  // Замена Стандартного Сообщения при Проверке

  var allInputs = document.querySelectorAll('input[type="text"]');

  if(allInputs.length)
  {
    allInputs.forEach(function(input) {
      input.oninvalid = function(e) {
        e.target.setCustomValidity('');
      };
    });
  }

  // Открытие модальных окон 
  
  var buttonContactUs = document.querySelectorAll('.contact-us__button');
  var modalContactUs = document.querySelector('#modal-contact-us');

  var buttonOrderCall = document.querySelectorAll('.button-order-call');
  var modalOrderCall = document.querySelector('#modal-order-call');

  var buttonAskQuestion = document.querySelectorAll('.button-ask-question');
  var modalAskQuestion = document.querySelector('#modal-ask-question');

  var buttonGiveFeedback = document.querySelectorAll('.button-give-feedback');
  var modalGiveFeedback = document.querySelector('#modal-give-feedback');

  var buttonOrderProduct = document.querySelectorAll('.button-order-product');
  var modalOrderProduct = document.querySelector('#modal-order-product');


  var animationModalForm = function(fn)
  {
      window.requestAnimationFrame(function()
      {
          window.requestAnimationFrame(function()
          {
              fn();
          });
      });
  }

  function viewForm(buttons, form)
  {
    buttons.forEach(function(button)
    {
      button.addEventListener('click',  function(e)
      {
        e.preventDefault();

        var img;
        var pathImg;
        var name;
        var price;

        if(button.classList.contains('button-order-product') && button.classList.contains('button'))
        {
          img = document.querySelector('[data-product-image="true"]');
          pathImg = img.src;
          name = document.querySelector('[data-product-name="true"]').innerHTML;
          price = document.querySelector('[data-product-price="true"]').innerHTML;
        }
        else if(button.classList.contains('button-order-product') && button.classList.contains('card-button')) 
        {
          var card = button.parentElement.parentElement;
          img = card.querySelector('[data-product-image="true"]');
          pathImg = img.src;
          name = card.querySelector('[data-product-name="true"]').innerHTML;
          price = card.querySelector('[data-product-price="true"]').innerHTML;
        }

        if(pathImg && name && price)
        {
          document.querySelector('.preview-product-image img').src = pathImg;
          document.querySelector('.preview-product-content__name').innerHTML = name;
          document.querySelector('.preview-product-content__price').innerHTML = price;
          document.querySelector('#name-product').value = name;
          document.querySelector('.total-price-product p').innerHTML = 'Сумма: ' + price;
          // console.log(document.querySelector('#name-product'));
        }

        var closeModal = form.querySelector('.close-modal a');

        shadow.appendChild(form);
        document.body.classList.add('disabled');
        shadow.classList.add('wrapper-shadow_active');
        
        animationModalForm(function() 
        {
            form.classList.add('modal-form_active');
        });

        shadow.addEventListener('click', function(e)
        {
            if(e.target.classList.contains('wrapper-shadow'))
            {
              form.classList.remove('modal-form_active'); 
              shadow.classList.remove('wrapper-shadow_active');
              document.body.appendChild(form);
              document.body.classList.remove('disabled');
            
              // setTimeout(function()
              // {
                  shadow.innerHTML = '';
              // }, 500);

            }
          
        });

        closeModal.addEventListener('click', function(e)
        {
            e.preventDefault();
            
            form.classList.remove('modal-form_active'); 
            shadow.classList.remove('wrapper-shadow_active');
            document.body.appendChild(form);
            document.body.classList.remove('disabled');
          
            // setTimeout(function()
            // {
                shadow.innerHTML = '';
            // }, 500);
          
        });

      });
    });
  }

  if(buttonContactUs.length)
  {
    viewForm(buttonContactUs, modalContactUs);
  }
  if(buttonOrderCall.length)
  {
    viewForm(buttonOrderCall, modalOrderCall);
  }
  if(buttonAskQuestion.length)
  {
    viewForm(buttonAskQuestion, modalAskQuestion);
  }
  if(buttonGiveFeedback.length)
  {
    viewForm(buttonGiveFeedback, modalGiveFeedback);
  }
  if(buttonOrderProduct.length)
  {
    viewForm(buttonOrderProduct, modalOrderProduct);
  }


  // Валидация формы и отправка данных

  var forms = document.querySelectorAll('form[data-ajax="ajax"]');

  if(forms.length)
  {
    forms.forEach(function(form)
    {
      // Подпишемся на событие отправки
      form.addEventListener('submit', function(e)
      {
          // if(form.name === 'form-search') ||  return;

          e.preventDefault();
        
          var valid = true;

          // Проверим все текстовые инпуты

          const fieldsText = form.querySelectorAll('input[type="text"]');

          fieldsText.forEach(function(input)
          {
              if(!checkFieldText(input)) valid = false;
          });

          // Проверим все textarea

          const fieldsTextarea = form.querySelectorAll('textarea');

          fieldsTextarea.forEach(function(textarea)
          {
              if(!checkFieldTextarea(textarea)) valid = false;
          });

          // Проверим все чекбоксы

          const fieldsCheckbox = form.querySelectorAll('input[type="checkbox"]');

          fieldsCheckbox.forEach(function(input)
          {
              if(!checkFieldCheckbox(input)) valid = false;
          });

          // Если были ошибки, не отправляем форму

          if(valid)
          {
            // console.log('Отправка');
            sendForm(form);   
          }
      });
    });
  }

  function checkFieldText(input) 
  {
    var errorClass = 'field-error';
    var pattern = input.pattern;
    var result;
    var value = input.value;
    
    result = value.match(pattern);
    result ? input.classList.remove(errorClass) : input.classList.add(errorClass);
    return result;
  }

  function checkFieldCheckbox(input) 
  {
    var errorClass = 'check-error';
    const result = input.checked;
    result ? input.classList.remove(errorClass) : input.classList.add(errorClass);
    return result;
  }

  function checkFieldTextarea(textarea)
  {
    var errorClass = 'field-error';
    var value = textarea.value;
    var result;

    if(value.trim() === '')
    {
      result = false;
    }
    else 
    {
      result = true;
    }

    result ? textarea.classList.remove(errorClass) : textarea.classList.add(errorClass);
    return result;
  }

  function sendForm(form)
  {
      var formData = new FormData(form);
      var xhr = new XMLHttpRequest();
      xhr.open("POST", form.action);
      xhr.onreadystatechange = function() 
      {
        if(xhr.status === 200) 
        {
          // console.log(xhr.responseText);
          if(document.querySelector('.modal-form_active'))
          {
            document.querySelector('.modal-form_active').classList.remove('modal-form_active');             
            document.body.appendChild(shadow.querySelector('.modal-form'));
            shadow.innerHTML = '';
            var successSending = document.querySelector('.successful-sending');
            successSending.classList.add('successful-sending_active');
            shadow.appendChild(successSending);

            shadow.addEventListener('click', function(e)
            {
              if(e.target.classList.contains('wrapper-shadow'))
              {
                successSending.classList.remove('successful-sending_active'); 
                shadow.classList.remove('wrapper-shadow_active');
                document.body.classList.remove('disabled');
                document.body.appendChild(successSending);
                shadow.innerHTML = '';
              }

            });

            successSending.querySelector('.close-modal a').addEventListener('click', function(e)
            {
              e.preventDefault();

              successSending.classList.remove('successful-sending_active'); 
              shadow.classList.remove('wrapper-shadow_active');
              document.body.classList.remove('disabled');
              document.body.appendChild(successSending);
              shadow.innerHTML = '';
            });
          }
          else 
          {
            var successSending = document.querySelector('.successful-sending');
            shadow.appendChild(successSending);
            shadow.classList.add('wrapper-shadow_active');
            successSending.classList.add('successful-sending_active');

            shadow.addEventListener('click', function(e)
            {
              if(e.target.classList.contains('wrapper-shadow'))
              {
                successSending.classList.remove('successful-sending_active'); 
                shadow.classList.remove('wrapper-shadow_active');
                document.body.classList.remove('disabled');
                document.body.appendChild(successSending);
                shadow.innerHTML = '';
              }

            });

            successSending.querySelector('.close-modal a').addEventListener('click', function(e)
            {
              e.preventDefault();

              successSending.classList.remove('successful-sending_active'); 
              shadow.classList.remove('wrapper-shadow_active');
              document.body.classList.remove('disabled');
              document.body.appendChild(successSending);
              shadow.innerHTML = '';
            });

          }
        }
        else 
        {
          if(document.querySelector('.modal-form_active'))
          {
            document.querySelector('.modal-form_active').classList.remove('modal-form_active');             
            document.body.appendChild(shadow.querySelector('.modal-form'));
            shadow.innerHTML = '';

            var errorSending = document.querySelector('.error-sending');
            errorSending.classList.add('error-sending_active');
            shadow.appendChild(errorSending);

            shadow.addEventListener('click', function(e)
            {
              if(e.target.classList.contains('wrapper-shadow'))
              {
                errorSending.classList.remove('error-sending_active'); 
                shadow.classList.remove('wrapper-shadow_active');
                document.body.classList.remove('disabled');
                document.body.appendChild(errorSending);
                shadow.innerHTML = '';
              }

            });

            errorSending.querySelector('.close-modal a').addEventListener('click', function(e)
            {
              e.preventDefault();

              errorSending.classList.remove('error-sending_active'); 
              shadow.classList.remove('wrapper-shadow_active');
              document.body.classList.remove('disabled');
              document.body.appendChild(errorSending);
              shadow.innerHTML = '';
            });

          }
          else 
          {
            var errorSending = document.querySelector('.error-sending');
            shadow.appendChild(errorSending);
            shadow.classList.add('wrapper-shadow_active');
            errorSending.classList.add('error-sending_active');

            shadow.addEventListener('click', function(e)
            {
              if(e.target.classList.contains('wrapper-shadow'))
              {
                errorSending.classList.remove('error-sending_active'); 
                shadow.classList.remove('wrapper-shadow_active');
                document.body.classList.remove('disabled');
                document.body.appendChild(errorSending);
                shadow.innerHTML = '';
              }

            });

            errorSending.querySelector('.close-modal a').addEventListener('click', function(e)
            {
              e.preventDefault();

              errorSending.classList.remove('error-sending_active'); 
              shadow.classList.remove('wrapper-shadow_active');
              document.body.classList.remove('disabled');
              document.body.appendChild(errorSending);
              shadow.innerHTML = '';
            });
          }
        }
      }
      xhr.onerror = function(e)
      {
        console.log("Error " + e.target.status + " occurred while receiving the document.");
      }

      xhr.send(formData);

  }


  // Для кнопки Наверх 
      
  let up = document.querySelector('#up');

  function trackScroll() 
  {
    var scrolled = window.pageYOffset;
    var coords = window.innerHeight;

    if (scrolled > coords) 
    {
        up.style.opacity = '1';
        up.style.zIndex = '10';
    }
    if (scrolled < coords) 
    {
        up.style.opacity = '0';
        up.style.zIndex = '-1';
    }
  }

  if(up)
  {
    window.addEventListener('scroll', trackScroll);
    up.addEventListener('click', backToTop);
  }


  function backToTop(e)
  {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: 'smooth',
    });
  }

  // Оптимизация всех слайдов на главной под одну высоту

  var mainSlides = document.querySelectorAll('.main-slider-slide');

  if(mainSlides.length)
  {
    var heightSlide = mainSlides[0].clientHeight;

    window.addEventListener('load', function()
    {
      // console.log('height');
      mainSlides.forEach(function(slide)
      {
        if(heightSlide < slide.clientHeight)
        {
          heightSlide = slide.clientHeight;
        } 
      });

      // this.console.log(heightSlide);

      mainSlides.forEach(function(slide)
      {
        slide.style.height = heightSlide + 'px';
      });

    });
  }

  // Фильтр категорий

  var filterBlock = document.querySelectorAll('.filter-content-block');
  var blockShows = [];

  if(filterBlock.length)
  {
    filterBlock.forEach(function(block)
    {
      var ref = block.querySelector('.ref-dropdown');
      
      if(ref)
      {
        ref.addEventListener('click', function(e)
        {
          e.preventDefault();
          
          if(block.querySelector('.block-dropdown').classList.contains('block-dropdown_show'))
          {
            block.querySelector('.block-dropdown').classList.remove('block-dropdown_show');
          }
          else 
          {
            blockShows = document.querySelectorAll('.block-dropdown_show');
            if(blockShows.length)
            {
              blockShows.forEach(function(block)
              {
                block.classList.remove('block-dropdown_show');
              });
            }
            block.querySelector('.block-dropdown').classList.add('block-dropdown_show');
          }
        });
      }
    });

    window.addEventListener('click', function(e) 
    {
      filterBlock.forEach(function(block)
      {
        if(!block.contains(e.target))
        {
          block.querySelector('.block-dropdown').classList.remove('block-dropdown_show');
        }
      });
    });
  }

  // Карточка товара

  var productSliderWrapper = document.querySelector('.product-slider-wrapper');

  if(productSliderWrapper)
  {
    var productSlider = tns({
      container: '.product-slider-wrapper',
      items: 1,
      auto: false,
      speed: 1000,
      nav: false,
      autoplayTimeout: 1000, 
      controlsContainer: '.product-slider-controls'
    });
  }

  var cardImages = document.querySelectorAll('.product-slider__block a');

  if(cardImages.length)
  {
    var tobii = new Tobii({
      zoom: false,
      nav: false,
      draggable: false,
      counter: false
    });
  }

});
















