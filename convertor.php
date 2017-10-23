<?php


/**
* encodeURIComponent escapes all characters except: Not Escaped: A-Z a-z 0-9 - _ . ! ~ * ' ( )
* rawlurlencode follows "RFC 3986" which reserves !, ', (, ), and *
*/
class Convertor {

	/**
	* get the str that JS could use decodeURIComponent to get the real string, while the rawurldecode could understarnd the !*'() sysmbol
	*/
	public static function getEncodedStr($rawString){
		$revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
		$result = strtr(rawurlencode($rawString), $revert);
		return $result;
	}

	/**
	* get the original string which is encoded by encodeURIComponent
	*/
	public static function getRawString($encodedStr){
		return rawurldecode($encodedStr);
	}

}


function test(){
	$testStr = 'a%2Fb_c%22-f%3Ad%20c%2520a99'; //from js encodeURIComponent('a/b_c"-f:d c%20a99');
	$aa = "%21abc'%29abc)";
	$abc = Convertor::getRawString($testStr);
	$abc = Convertor::getEncodedStr($aa);
	echo $abc;
}

test();

