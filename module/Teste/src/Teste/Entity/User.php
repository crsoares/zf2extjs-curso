<?php

namespace Teste\Entity;

class User
{
	protected $id;
	protected $email;
	protected $name;
	protected $userAddress;

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	public function getId()
	{
		return $this->id;
	}

	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getName($name) 
	{
		return $this->name;
	}

	public function setUserAddress($userAddress)
	{
		$this->userAddress = $userAddress;
		return $this;
	}

	public function getUserAddress()
	{
		return $this->userAddress;
	}
}