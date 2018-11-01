// import external dependencies
import 'jquery';
import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { faPhone } from '@fortawesome/free-solid-svg-icons';
import { faEnvelope } from '@fortawesome/free-regular-svg-icons';
import { faFacebook, faInstagram } from "@fortawesome/free-brands-svg-icons";
library.add(faEnvelope, faFacebook, faInstagram, faPhone);

// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import templateHaandvaerk from './routes/template-haandvaerk';
import portefolio from './routes/portefolio';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,

  templateHaandvaerk,

  portefolio,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
dom.watch();
