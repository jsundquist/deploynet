'use strict';

angular.module('deployNet.version', [
  'deployNet.version.interpolate-filter',
  'deployNet.version.version-directive'
])

.value('version', '0.1');
