<?php
namespace EcShop\EcShop;

/**
 * Autogenerated by Thrift Compiler (0.9.2)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


class ParamsIn {
  static $_TSPEC;

  /**
   * @var string
   */
  public $strCmdID = null;
  /**
   * @var string
   */
  public $jsonIn = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'strCmdID',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'jsonIn',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['strCmdID'])) {
        $this->strCmdID = $vals['strCmdID'];
      }
      if (isset($vals['jsonIn'])) {
        $this->jsonIn = $vals['jsonIn'];
      }
    }
  }

  public function getName() {
    return 'ParamsIn';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->strCmdID);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->jsonIn);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('ParamsIn');
    if ($this->strCmdID !== null) {
      $xfer += $output->writeFieldBegin('strCmdID', TType::STRING, 1);
      $xfer += $output->writeString($this->strCmdID);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->jsonIn !== null) {
      $xfer += $output->writeFieldBegin('jsonIn', TType::STRING, 2);
      $xfer += $output->writeString($this->jsonIn);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class ParamsOut {
  static $_TSPEC;

  /**
   * @var int
   */
  public $errorCode = null;
  /**
   * @var string
   */
  public $message = null;
  /**
   * @var string
   */
  public $jsonOut = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'errorCode',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'message',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'jsonOut',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['errorCode'])) {
        $this->errorCode = $vals['errorCode'];
      }
      if (isset($vals['message'])) {
        $this->message = $vals['message'];
      }
      if (isset($vals['jsonOut'])) {
        $this->jsonOut = $vals['jsonOut'];
      }
    }
  }

  public function getName() {
    return 'ParamsOut';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->errorCode);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->message);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->jsonOut);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('ParamsOut');
    if ($this->errorCode !== null) {
      $xfer += $output->writeFieldBegin('errorCode', TType::I32, 1);
      $xfer += $output->writeI32($this->errorCode);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->message !== null) {
      $xfer += $output->writeFieldBegin('message', TType::STRING, 2);
      $xfer += $output->writeString($this->message);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->jsonOut !== null) {
      $xfer += $output->writeFieldBegin('jsonOut', TType::STRING, 3);
      $xfer += $output->writeString($this->jsonOut);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

