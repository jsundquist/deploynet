'use strict';

describe('deployNet.version module', function() {
  beforeEach(module('deployNet.version'));

  describe('version service', function() {
    it('should return current version', inject(function(version) {
      expect(version).toEqual('0.1');
    }));
  });
});
