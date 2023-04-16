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

namespace Google\Service\Batch;

class Container extends \Google\Collection
{
  protected $collection_key = 'volumes';
  /**
   * @var bool
   */
  public $blockExternalNetwork;
  /**
   * @var string[]
   */
  public $commands = [];
  /**
   * @var string
   */
  public $entrypoint;
  /**
   * @var string
   */
  public $imageUri;
  /**
   * @var string
   */
  public $options;
  /**
   * @var string
   */
  public $password;
  /**
   * @var string
   */
  public $username;
  /**
   * @var string[]
   */
  public $volumes = [];

  /**
   * @param bool
   */
  public function setBlockExternalNetwork($blockExternalNetwork)
  {
    $this->blockExternalNetwork = $blockExternalNetwork;
  }
  /**
   * @return bool
   */
  public function getBlockExternalNetwork()
  {
    return $this->blockExternalNetwork;
  }
  /**
   * @param string[]
   */
  public function setCommands($commands)
  {
    $this->commands = $commands;
  }
  /**
   * @return string[]
   */
  public function getCommands()
  {
    return $this->commands;
  }
  /**
   * @param string
   */
  public function setEntrypoint($entrypoint)
  {
    $this->entrypoint = $entrypoint;
  }
  /**
   * @return string
   */
  public function getEntrypoint()
  {
    return $this->entrypoint;
  }
  /**
   * @param string
   */
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  /**
   * @return string
   */
  public function getImageUri()
  {
    return $this->imageUri;
  }
  /**
   * @param string
   */
  public function setOptions($options)
  {
    $this->options = $options;
  }
  /**
   * @return string
   */
  public function getOptions()
  {
    return $this->options;
  }
  /**
   * @param string
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }
  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }
  /**
   * @param string
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }
  /**
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }
  /**
   * @param string[]
   */
  public function setVolumes($volumes)
  {
    $this->volumes = $volumes;
  }
  /**
   * @return string[]
   */
  public function getVolumes()
  {
    return $this->volumes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Container::class, 'Google_Service_Batch_Container');
