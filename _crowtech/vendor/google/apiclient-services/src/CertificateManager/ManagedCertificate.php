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

namespace Google\Service\CertificateManager;

class ManagedCertificate extends \Google\Collection
{
  protected $collection_key = 'domains';
  protected $authorizationAttemptInfoType = AuthorizationAttemptInfo::class;
  protected $authorizationAttemptInfoDataType = 'array';
  public $authorizationAttemptInfo = [];
  /**
   * @var string[]
   */
  public $dnsAuthorizations = [];
  /**
   * @var string[]
   */
  public $domains = [];
  /**
   * @var string
   */
  public $issuanceConfig;
  protected $provisioningIssueType = ProvisioningIssue::class;
  protected $provisioningIssueDataType = '';
  public $provisioningIssue;
  /**
   * @var string
   */
  public $state;

  /**
   * @param AuthorizationAttemptInfo[]
   */
  public function setAuthorizationAttemptInfo($authorizationAttemptInfo)
  {
    $this->authorizationAttemptInfo = $authorizationAttemptInfo;
  }
  /**
   * @return AuthorizationAttemptInfo[]
   */
  public function getAuthorizationAttemptInfo()
  {
    return $this->authorizationAttemptInfo;
  }
  /**
   * @param string[]
   */
  public function setDnsAuthorizations($dnsAuthorizations)
  {
    $this->dnsAuthorizations = $dnsAuthorizations;
  }
  /**
   * @return string[]
   */
  public function getDnsAuthorizations()
  {
    return $this->dnsAuthorizations;
  }
  /**
   * @param string[]
   */
  public function setDomains($domains)
  {
    $this->domains = $domains;
  }
  /**
   * @return string[]
   */
  public function getDomains()
  {
    return $this->domains;
  }
  /**
   * @param string
   */
  public function setIssuanceConfig($issuanceConfig)
  {
    $this->issuanceConfig = $issuanceConfig;
  }
  /**
   * @return string
   */
  public function getIssuanceConfig()
  {
    return $this->issuanceConfig;
  }
  /**
   * @param ProvisioningIssue
   */
  public function setProvisioningIssue(ProvisioningIssue $provisioningIssue)
  {
    $this->provisioningIssue = $provisioningIssue;
  }
  /**
   * @return ProvisioningIssue
   */
  public function getProvisioningIssue()
  {
    return $this->provisioningIssue;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedCertificate::class, 'Google_Service_CertificateManager_ManagedCertificate');
