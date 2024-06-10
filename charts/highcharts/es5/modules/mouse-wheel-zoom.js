!/**
 * Highcharts JS v11.4.3 (2024-05-22)
 *
 * Mousewheel zoom module
 *
 * (c) 2023 Askel Eirik Johansson
 *
 * License: www.highcharts.com/license
 */function(e){"object"==typeof module&&module.exports?(e.default=e,module.exports=e):"function"==typeof define&&define.amd?define("highcharts/modules/mouse-wheel-zoom",["highcharts"],function(t){return e(t),e.Highcharts=t,e}):e("undefined"!=typeof Highcharts?Highcharts:void 0)}(function(e){"use strict";var t=e?e._modules:{};function i(e,t,i,o){e.hasOwnProperty(t)||(e[t]=o.apply(null,i),"function"==typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:t,module:e[t]}})))}i(t,"Extensions/Annotations/NavigationBindingsUtilities.js",[t["Core/Utilities.js"]],function(e){var t=e.defined,i=e.isNumber,o=e.pick,n={backgroundColor:"string",borderColor:"string",borderRadius:"string",color:"string",fill:"string",fontSize:"string",labels:"string",name:"string",stroke:"string",title:"string"};return{annotationsFieldsTypes:n,getAssignedAxis:function(e){return e.filter(function(e){var t=e.axis.getExtremes(),n=t.min,s=t.max,r=o(e.axis.minPointOffset,0);return i(n)&&i(s)&&e.value>=n-r&&e.value<=s+r&&!e.axis.options.isInternal})[0]},getFieldType:function(e,i){var o=n[e],s=typeof i;return t(o)&&(s=o),({string:"text",number:"number",boolean:"checkbox"})[s]}}}),i(t,"Extensions/MouseWheelZoom/MouseWheelZoom.js",[t["Core/Utilities.js"],t["Extensions/Annotations/NavigationBindingsUtilities.js"]],function(e,t){var i,o=e.addEvent,n=e.isObject,s=e.pick,r=e.defined,a=e.merge,l=t.getAssignedAxis,u=[],d={enabled:!0,sensitivity:1.1},h=function(e,t,o,n,a,l,u){var d=s(u.type,e.zooming.type,""),h=[];"x"===d?h=o:"y"===d?h=n:"xy"===d&&(h=e.axes);var c=e.transform({axes:h,to:{x:a-5,y:l-5,width:10,height:10},from:{x:a-5*t,y:l-5*t,width:10*t,height:10*t},trigger:"mousewheel"});return c&&(r(i)&&clearTimeout(i),i=setTimeout(function(){var t;null===(t=e.pointer)||void 0===t||t.drop()},400)),c};function c(){var e,t=this,i=(n(e=this.zooming.mouseWheel)||(e={enabled:null==e||e}),a(d,e));i.enabled&&o(this.container,"wheel",function(e){e=(null===(o=t.pointer)||void 0===o?void 0:o.normalize(e))||e;var o,n,s=t.pointer,r=s&&!s.inClass(e.target,"highcharts-no-mousewheel");if(t.isInsidePlot(e.chartX-t.plotLeft,e.chartY-t.plotTop)&&r){var a=i.sensitivity||1.1,u=e.detail||(e.deltaY||0)/120,d=l(s.getCoordinates(e).xAxis),c=l(s.getCoordinates(e).yAxis);h(t,Math.pow(a,u),d?[d.axis]:t.xAxis,c?[c.axis]:t.yAxis,e.chartX,e.chartY,i)&&(null===(n=e.preventDefault)||void 0===n||n.call(e))}})}return{compose:function(e){-1===u.indexOf(e)&&(u.push(e),o(e,"afterGetContainer",c))}}}),i(t,"masters/modules/mouse-wheel-zoom.src.js",[t["Core/Globals.js"],t["Extensions/MouseWheelZoom/MouseWheelZoom.js"]],function(e,t){return e.MouseWheelZoom=e.MouseWheelZoom||t,e.MouseWheelZoom.compose(e.Chart),e})});