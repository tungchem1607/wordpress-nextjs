!function(e){var t={};function s(a){if(t[a])return t[a].exports;var o=t[a]={i:a,l:!1,exports:{}};return e[a].call(o.exports,o,o.exports,s),o.l=!0,o.exports}s.m=e,s.c=t,s.d=function(e,t,a){s.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a})},s.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},s.t=function(e,t){if(1&t&&(e=s(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(s.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)s.d(a,o,function(t){return e[t]}.bind(null,o));return a},s.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return s.d(t,"a",t),t},s.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},s.p="",s(s.s=3)}([function(e,t,s){s.p=window.flatsomeVars?window.flatsomeVars.assets_url:"/"},,,function(e,t,s){s(0),e.exports=s(4)},function(e,t){!function(e){"use strict";const t="stacked"===flatsomeVars.options.swatches_layout,s='<span class="ux-swatch-selected-value__separator">:&nbsp;</span>',a="ontouchstart"in window;e.fn.flatsomeSwatches=function(){return this.each((function(){var a=e(this);function o(){setTimeout((function(){a.find("tbody tr").each((function(){var t=e(this),s=t.find("select").find("option"),a=s.filter(":selected"),o=[];s.each((function(t,s){""!==s.value&&!0!==e(s).prop("disabled")&&o.push(s.value)})),t.find(".ux-swatch").each((function(){var t=e(this),s=t.attr("data-value");-1!==o.indexOf(s)?t.removeClass("disabled"):(t.addClass("disabled"),a.length&&s===a.val()&&t.removeClass("selected"))}))}))}),100)}function n(e,a){t&&(a=a?s+a:"",e.parents("tr").find(".ux-swatch-selected-value").html()!==a&&e.parents("tr").find(".ux-swatch-selected-value").html(a))}function c(){t&&a.find(".ux-swatch.selected").each((function(){const t=e(this).attr("data-name");e(this).parents("tr").find(".ux-swatch-selected-value").html(s+t)}))}a.hasClass("ux-swatches-js-attached")||(t&&a.find(".variations .label").append('<span class="ux-swatch-selected-value"></span>'),a.on("click",".ux-swatch",(function(t){t.preventDefault();var s=e(this),a=s.closest(".value").find("select"),o=s.data("value"),c=s.data("name");s.hasClass("disabled")||(s.hasClass("selected")?(a.val(""),s.removeClass("selected"),n(s,"")):(s.addClass("selected").siblings(".selected").removeClass("selected"),a.val(o),n(s,c)),a.change())})),a.on("mouseenter mouseleave",".ux-swatch",(function(t){const s=e(this);"mouseenter"===t.type&&n(s,s.attr("data-name")),"mouseleave"===t.type&&n(s,s.closest(".ux-swatches").find(".ux-swatch.selected").attr("data-name"))})),a.on("click",".reset_variations",(function(){a.find(".ux-swatch.selected").removeClass("selected"),a.find(".ux-swatch.disabled").removeClass("disabled"),t&&a.find(".ux-swatch-selected-value").html("")})),o(),a.on("woocommerce_update_variation_values",(function(){o()})),c(),a.on("show_variation",(function(){c()})),a.addClass("ux-swatches-js-attached"))}))};const o=!flatsomeVars.options.swatches_box_behavior_selected,n=Boolean(flatsomeVars.options.swatches_box_update_urls),c="click"===flatsomeVars.options.swatches_box_select_event?"click":"hover",i=Boolean(flatsomeVars.options.swatches_box_reset),r=flatsomeVars.options.swatches_box_reset_extent,l=parseInt(flatsomeVars.options.swatches_box_reset_time);e.fn.flatsomeSwatchesLoop=function(){return this.each((function(){var t=e(this);if(t.hasClass("ux-swatches-in-loop-js-attached"))return;var s,u,d,f,h,m=t.closest(".product-small"),p=m.find(".box-image a").first().attr("href"),v=[],w=!1;let _;if("hover"===c&&t.on("mouseenter",".ux-swatch",(function(t){if(!a){var s=e(this);x(),b(s)}})),t.on("click",".ux-swatch",(function(t){t.preventDefault();var s=e(this);if(s.hasClass("selected")){if(o)return void(window.location=h||p);s.removeClass("selected"),m.removeClass("ux-swatch-active"),C(),n&&g(v)}else x(),b(s)})),t.on("click",".ux-swatches__limiter",(function(t){const s=e(this);s.parent().find(".ux-swatch.hidden").removeClass("hidden").fadeOut(0).fadeIn(500),s.hide(),e(document).trigger("flatsome-equalize-box")})),i){const e="product-box"===r?"":".ux-swatch";("product-box"===r?m:t).on("mouseenter mouseleave",e,(function(e){if("mouseleave"===e.type){const e=t.find(".selected");e.length&&(_=setTimeout((function(){e.removeClass("selected"),m.removeClass("ux-swatch-active"),C(),n&&g(v)}),l))}else clearTimeout(_)}))}function x(){w||(f=m.find(".box-image picture:not(.back-image) source"),s=m.find(".box-image img:not(.back-image)").first(),u=s.attr("src"),d=s.attr("srcset"),v.push(m.find(".box-image a").first()),v.push(m.find(".woocommerce-loop-product__link")),v.push(m.find(".product_type_variable.add_to_cart_button")),w=!0)}function b(e){e.hasClass("selected")||(t.find(".selected").removeClass("selected"),e.addClass("selected"),m.addClass("ux-swatch-active"),function(e){s.attr("src",e.data("image-src")),e.data("image-srcset")&&(s.attr("srcset",e.data("image-srcset")),f&&f.attr("srcset",e.data("image-srcset")))}(e),n&&function(e,t,s){var a=(t.indexOf("?")>-1?"&":"?")+e.data("attribute_name")+"="+e.data("value");s.forEach((function(e){e.attr("href",t+a)})),h=t+a}(e,p,v))}function C(){s&&s.attr("src",u),d&&(s.attr("srcset",d),f&&f.attr("srcset",d))}function g(e){e.forEach((function(e){e.attr("href",p)}))}t.addClass("ux-swatches-in-loop-js-attached")}))},e((function(){const t=".ux-swatches-in-loop:not(.js-ux-swatches)";e(".variations_form").flatsomeSwatches(),e(t).flatsomeSwatchesLoop(),e(document).on("wc_variation_form",(function(){e(".variations_form").flatsomeSwatches()})),e(document.body).on("wc-composite-initializing",".composite_data",(function(t,s){s.actions.add_action("component_options_state_changed",(function(t){e(t.$component_content).find(".variations_form").removeClass("ux-swatches-js-attached")}))})),e(document).on("flatsome-infiniteScroll-append",(function(s,a,o,n){e(t,n).flatsomeSwatchesLoop()})),e(document).on("facetwp-loaded",(function(){e(t).flatsomeSwatchesLoop()})),"undefined"!=typeof wp&&wp.customize&&wp.customize.selectiveRefresh&&wp.customize.selectiveRefresh.bind("partial-content-rendered",(function(s){e(t,s.container).flatsomeSwatchesLoop()})),e(document).ajaxComplete((function(){setTimeout(()=>{e(".variations_form").flatsomeSwatches(),e(t).flatsomeSwatchesLoop()},100)})),e(document.body).on("updated_wc_div",(function(){setTimeout(()=>{e(".variations_form").flatsomeSwatches(),e(t).flatsomeSwatchesLoop()},100)}))}))}(jQuery)}]);