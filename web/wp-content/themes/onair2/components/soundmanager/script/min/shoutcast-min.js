/*

This version of the library has been customized for the OnAir 2 theme by Qantumthemes
last edit 2016 11 20
* variables check
* clearInterval fixes
*
*
*
*
*
*
*
*
*	DEFAULT VERSION
*	NOT IN USE!
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
*
* 

*/
!function(i){"use strict";function s(t){this._attr={},void 0===t&&(t={}),
//how often to auto update
this.playedInterval=t.playedInterval||t.interval||3e4,this.statsInterval=t.statsInterval||t.interval||5e3,this.host=t.host,this.port=parseInt(t.port,10)||8e3,this.stream=parseInt(t.stream,10)||1,this.protocol=t.protocol||"auto",this.stats_path=t.stats_path||"stats",this.played_path=t.played_path||"played",this._statsinterval=null,this._playedinterval=null,this._stats=t.stats||function(){},this._played=t.played||function(){}}
/**
	 * Get attributes
	 * @param  {string} k the key to get e.g. songtitle [optional] - if theres no key all attributes will be returned
	 * @param  {mixed} d default value if the key value is not present [optional]
	 * @return {mixed}
	 */if(s.prototype.get=function(t,s){return t?void 0!==this._attr[t.toLowerCase()]?this._attr[t.toLowerCase()]:s:this._attr},
/**
	 * Get the shoutcast stats using /stats?sid=
	 * @param  {Function} fn the callback function, this will be passed the stats on success
	 * @return {SHOUTcast}      return this for chaining.
	 */
s.prototype.stats=function(s){var a=this,t,e="http://"+this.host+":"+this.port+"/"+this.stats_path+"?sid="+this.stream+"&json=1";return null!==this._statsinterval&&clearInterval(this._statsinterval),
// console.log("[this.host] = "+this.host);
s=s||function(){},(t=i.ajax({url:e,dataType:"jsonp",timeout:"5000"})).success(function(t){
// console.log("Data retriven from feed. Checking if is json");
"object"==typeof t&&void 0!==t.streamstatus?(
//2 = on air, 1 = no source
a._status=1===t.streamstatus?2:1,
// console.log("Stream status = "+that._status);
a._attr=t,a._attr.status=a.getStatusAsText(),
//call the update method, give the raw data just incase its required
s.call(a,a._attr),a._stats(a._attr)):
// console.log("Data format is not correct, aborting");
a._status=0}),t.error(function(){
// console.log("Error retriving the data via ajax.");
null!==this._statsinterval&&clearInterval(this._statsinterval)}),this},
/**
	 * Get the played information from /played?sid=
	 * @param  {Function} fn the callback function, will be passed an array of objects on success
	 * @return {SHOUTcast}      return this for chaining
	 */
s.prototype.played=function(s){var a=this,t="http://"+this.host+":"+this.port+"/"+this.played_path+"?sid="+this.stream+"&type=json";
// console.log("===================>"+url);
return i.ajax({url:t,dataType:"jsonp",timeout:2e3,success:function(t){!t instanceof Array||(s&&s.call(a,t),a._played(t))}}),this},
/**
	 * Start updating using the stats method
	 * @return {SHOUTcast} return this for chaining
	 */
s.prototype.startStats=function(){
// this._statsinterval = setInterval($.proxy(this.stats,this), this.statsInterval);
// console.log("\n =======  STOPPING STATS  ========= \n");
return this.stats(),null!==this._statsinterval&&void 0!==this._statsinterval&&
// console.log("Clearing stats interval this._statsinterval ===>" + this._statsinterval);
clearInterval(this._statsinterval),this},
/**
	 * Stop updating stats
	 * @return {SHOUTcast} return this for chaining
	 */
s.prototype.stopStats=function(){return this._statsinterval&&clearInterval(this._statsinterval),this},
/**
	 * Start updating played information
	 * @return {SHOUTcast} this for chaining
	 */
s.prototype.startPlayed=function(){
// this._playedinterval = setInterval($.proxy(this.played,this),this.playedInterval);
return this.stopPlayed(),this.played(),i.proxy(this.played,this),this},
/**
	 * Stop updating the played information
	 * @return {SHOUTcast} this for chaining
	 */
s.prototype.stopPlayed=function(){return this._playedinterval&&clearInterval(this._playedinterval),this},
/**
	 * Get the SHOUTcast status based on the last stats call
	 * @return {int} the status 0 = offline, 1 = no source connected, 2 = on air
	 */
s.prototype.getStatus=function(){return this._status},s.prototype.getStatusAsText=function(){return["Offline","Awaiting Connection","On Air"][this._status]},
/**
	 * Check if the SHOUTcast server is on air.
	 * @return {bool} whether the server is on air or not (this means source connected)
	 */
s.prototype.onAir=function(){return 2===this._status},
/**
	 * The jQuery plug
	 * @param {object} opt the options to pass to the shoutcast object
	 * @return { SHOUTcast} the shotucast object
	 */
i.SHOUTcast=function(t){return new s(t)},!i("body").hasClass("qt-debug")){var t={log:function(){}};window.console=t}}(jQuery);