<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Safebrowsing;

class GoogleSecuritySafebrowsingV4ListThreatListsResponse extends \Google\Collection
{
  protected $collection_key = 'threatLists';
  protected $threatListsType = GoogleSecuritySafebrowsingV4ThreatListDescriptor::class;
  protected $threatListsDataType = 'array';
  public $threatLists = [];

  /**
   * @param GoogleSecuritySafebrowsingV4ThreatListDescriptor[]
   */
  public function setThreatLists($threatLists)
  {
    $this->threatLists = $threatLists;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ThreatListDescriptor[]
   */
  public function getThreatLists()
  {
    return $this->threatLists;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSecuritySafebrowsingV4ListThreatListsResponse::class, 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4ListThreatListsResponse');
