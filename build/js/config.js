/*------------------------------*\

    #CONFIG

\*------------------------------*/

var siteURL = '';
var themeURL = '/wp-content/themes/rac-web-bd/';
var isMobile = false;
var isHome = false;
var isBD = false;

// Activate resize events
var resizeEvent = false;
var resizeDebouncer = true;

// Store window sizes
var windowH; 
var windowW; 
calc_window();
var docH;

// Breakpoint
var bpSmall;
var bpMedium;
var bpLarge;
var bpXlarge;



