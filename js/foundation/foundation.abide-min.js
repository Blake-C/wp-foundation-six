!function(e,$){"use strict";function t(r,a){this.$element=r,this.options=$.extend({},t.defaults,this.$element.data(),a),this.$window=$(window),this.name="Abide",this.attr="data-abide",this._init(),this._events(),e.registerPlugin(this)}t.defaults={validateOn:"fieldChange",labelErrorClass:"is-invalid-label",inputErrorClass:"is-invalid-input",formErrorSelector:".form-error",formErrorClass:"is-visible",patterns:{alpha:/^[a-zA-Z]+$/,alpha_numeric:/^[a-zA-Z0-9]+$/,integer:/^[-+]?\d+$/,number:/^[-+]?\d*(?:[\.\,]\d+)?$/,card:/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/,cvv:/^([0-9]){3,4}$/,email:/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/,url:/^(https?|ftp|file|ssh):\/\/(((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/,domain:/^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,8}$/,datetime:/^([0-2][0-9]{3})\-([0-1][0-9])\-([0-3][0-9])T([0-5][0-9])\:([0-5][0-9])\:([0-5][0-9])(Z|([\-\+]([0-1][0-9])\:00))$/,date:/(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))$/,time:/^(0[0-9]|1[0-9]|2[0-3])(:[0-5][0-9]){2}$/,dateISO:/^\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}$/,month_day_year:/^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.]\d{4}$/,day_month_year:/^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.]\d{4}$/,color:/^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/},validators:{equalTo:function(e,t,r){var a=document.getElementById(e.getAttribute(this.add_namespace("data-equalto"))).value,i=e.value,n=a===i;return n}}},t.prototype._init=function(){},t.prototype._events=function(){var e=this;this.$element.off(".abide").on("reset.fndtn.abide",function(t){e.resetForm($(this))}).on("submit.fndtn.abide",function(t){t.preventDefault(),e.validateForm(e.$element)}).find("input, textarea, select").off(".abide").on("blur.fndtn.abide change.fndtn.abide",function(t){"fieldChange"===e.options.validateOn&&e.validateInput($(t.target),e.$element)}).on("keydown.fndtn.abide",function(e){})},t.prototype._reflow=function(){var e=this},t.prototype.requiredCheck=function(e){switch(e[0].type){case"text":return e.attr("required")&&!e.val()?!1:!0;break;case"password":return e.attr("required")&&!e.val()?!1:!0;break;case"checkbox":return e.attr("required")&&!e.is(":checked")?!1:!0;break;case"radio":return e.attr("required")&&!e.is(":checked")?!1:!0;break;default:return!e.attr("required")||e.val()&&e.val().length&&!e.is(":empty")?!0:!1}},t.prototype.findLabel=function(e){return e.next("label").length?e.next("label"):e.closest("label")},t.prototype.addErrorClasses=function(e){var t=this,r=t.findLabel(e),a=e.next(t.options.formErrorSelector)||e.find(t.options.formErrorSelector);r&&r.addClass(t.options.labelErrorClass),a&&a.addClass(t.options.formErrorClass),e.addClass(t.options.inputErrorClass)},t.prototype.removeErrorClasses=function(e){var t=this,r=t.findLabel(e),a=e.next(t.options.formErrorSelector)||e.find(t.options.formErrorSelector);r&&r.hasClass(t.options.labelErrorClass)&&r.removeClass(t.options.labelErrorClass),a&&a.hasClass(t.options.formErrorClass)&&a.removeClass(t.options.formErrorClass),e.hasClass(t.options.inputErrorClass)&&e.removeClass(t.options.inputErrorClass)},t.prototype.validateInput=function(e,t){var r=this,a=t.find('input[type="text"]'),i=t.find('input[type="password"]'),n=t.find('input[type="checkbox"]'),o,s;"text"===e[0].type?r.requiredCheck(e)&&r.validateText(e)?(r.removeErrorClasses(e),e.trigger("valid.fndtn.abide",e[0])):(r.addErrorClasses(e),e.trigger("invalid.fndtn.abide",e[0])):"radio"===e[0].type?(s=e.attr("name"),o=e.siblings("label"),r.validateRadio(s)?($(o).each(function(){$(this).hasClass(r.options.labelErrorClass)&&$(this).removeClass(r.options.labelErrorClass)}),e.trigger("valid.fndtn.abide",e[0])):($(o).each(function(){$(this).addClass(r.options.labelErrorClass)}),e.trigger("invalid.fndtn.abide",e[0]))):"checkbox"===e[0].type?r.requiredCheck(e)?(r.removeErrorClasses(e),e.trigger("valid.fndtn.abide",e[0])):(r.addErrorClasses(e),e.trigger("invalid.fndtn.abide",e[0])):r.requiredCheck(e)&&r.validateText(e)?(r.removeErrorClasses(e),e.trigger("valid.fndtn.abide",e[0])):(r.addErrorClasses(e),e.trigger("invalid.fndtn.abide",e[0]))},t.prototype.validateForm=function(e){for(var t=this,r=e.find("input"),a=e.find("input").length,i=0;a>i;)t.validateInput($(r[i]),e),i++;e.find(".form-error.is-visible").length||e.find(".is-invalid-label").length?e.find("[data-abide-error]").css("display","block"):e.find("[data-abide-error]").css("display","none")},t.prototype.validateText=function(e){var t=this,r=!1,a=this.options.patterns,i=$(e).val(),n=$(e).attr("pattern");return 0===i.length?!0:i.match(a[n])?!0:!1},t.prototype.validateRadio=function(e){var t=this,r=$(':radio[name="'+e+'"]').siblings("label"),a=0;return $(':radio[name="'+e+'"]').each(function(){t.requiredCheck($(this))||a++,$(this).is(":checked")&&(a=0)}),a>0?!1:!0},t.prototype.matchValidation=function(e,t){},t.prototype.resetForm=function(e){var t=this,r="data-invalid";$("["+t.invalidAttr+"]",e).removeAttr(r),$("."+t.options.labelErrorClass,e).not("small").removeClass(t.options.labelErrorClass),$("."+t.options.inputErrorClass,e).not("small").removeClass(t.options.inputErrorClass),$(".form-error.is-visible").removeClass("is-visible"),e.find("[data-abide-error]").css("display","none"),$(":input",e).not(":button, :submit, :reset, :hidden, [data-abide-ignore]").val("").removeAttr(r)},t.prototype.destroy=function(){},e.plugin(t,"Abide"),"undefined"!=typeof module&&"undefined"!=typeof module.exports&&(module.exports=t),"function"==typeof define&&define(["foundation"],function(){return t})}(Foundation,jQuery);