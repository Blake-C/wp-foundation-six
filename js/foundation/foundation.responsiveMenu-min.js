!function(n,$){"use strict";function e(e){this.$element=$(e),this.rules=this.$element.data("responsive-menu"),this.currentMq=null,this.currentPlugin=null,this._init(),this._events(),n.registerPlugin(this)}var i={dropdown:{cssClass:"dropdown",plugin:n._plugins["dropdown-menu"]||null},drilldown:{cssClass:"drilldown",plugin:n._plugins.drilldown||null},accordion:{cssClass:"accordion-menu",plugin:n._plugins["accordion-menu"]||null}},s={small:"(min-width: 0px)",medium:"(min-width: 640px)"};e.defaults={},e.prototype._init=function(){for(var n={},e=this.rules.split(" "),s=0;s<e.length;s++){var t=e[s].split("-"),l=t.length>1?t[0]:"small",u=t.length>1?t[1]:t[0];null!==i[u]&&(n[l]=i[u])}this.rules=n,$.isEmptyObject(n)||this._checkMediaQueries()},e.prototype._events=function(){var n=this;$(window).on("changed.zf.mediaquery",function(){n._checkMediaQueries()})},e.prototype._checkMediaQueries=function(){var e,s=this;$.each(this.rules,function(i){n.MediaQuery.atLeast(i)&&(e=i)}),e&&(this.currentPlugin instanceof this.rules[e].plugin||($.each(i,function(n,e){s.$element.removeClass(e.cssClass)}),this.$element.addClass(this.rules[e].cssClass),this.currentPlugin&&this.currentPlugin.destroy(),this.currentPlugin=new this.rules[e].plugin(this.$element,{})))},e.prototype.destroy=function(){this.currentPlugin.destroy(),$(window).off(".zf.ResponsiveMenu"),n.unregisterPlugin(this)},n.plugin(e,"ResponsiveMenu")}(Foundation,jQuery);