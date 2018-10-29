'use strict';
const $ = require( 'jquery' );
import Headroom from 'node_modules/headroom.js/dist/headroom.js';
require ( './customizer' );


const headroomOptions = {
  'tolerance': 20,
  'offset': 80,
  'classes': {
    'initial': 'animated',
    'pinned': 'slideDown',
    'unpinned': 'slideUp'
  }
};

const header = document.querySelector( '.headroom' );
let headroom = new Headroom( header );
headroom.init( headroomOptions );


$( window ).scroll( function() {
  if ( 140 <  $( this ).scrollTop() ) {
    $( '.headroom' ).removeClass( 'ontop-now' );
  } else {
    $( '.headroom' ).addClass( 'ontop-now' );
  }
});

$( '.carousel' ).carousel({
  interval: 2000
});
