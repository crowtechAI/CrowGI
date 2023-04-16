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

namespace Google\Service\Contentwarehouse;

class NlxDataSchemaLanguageSpan extends \Google\Collection
{
  protected $collection_key = 'languageCode';
  protected $bytesType = MultiscalePointerSpan::class;
  protected $bytesDataType = '';
  public $bytes;
  protected $charactersType = MultiscalePointerSpan::class;
  protected $charactersDataType = '';
  public $characters;
  protected $documentType = MultiscalePointerIndex::class;
  protected $documentDataType = '';
  public $document;
  /**
   * @var string[]
   */
  public $languageCode = [];

  /**
   * @param MultiscalePointerSpan
   */
  public function setBytes(MultiscalePointerSpan $bytes)
  {
    $this->bytes = $bytes;
  }
  /**
   * @return MultiscalePointerSpan
   */
  public function getBytes()
  {
    return $this->bytes;
  }
  /**
   * @param MultiscalePointerSpan
   */
  public function setCharacters(MultiscalePointerSpan $characters)
  {
    $this->characters = $characters;
  }
  /**
   * @return MultiscalePointerSpan
   */
  public function getCharacters()
  {
    return $this->characters;
  }
  /**
   * @param MultiscalePointerIndex
   */
  public function setDocument(MultiscalePointerIndex $document)
  {
    $this->document = $document;
  }
  /**
   * @return MultiscalePointerIndex
   */
  public function getDocument()
  {
    return $this->document;
  }
  /**
   * @param string[]
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string[]
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlxDataSchemaLanguageSpan::class, 'Google_Service_Contentwarehouse_NlxDataSchemaLanguageSpan');
