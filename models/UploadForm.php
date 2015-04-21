<?php  

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
* UploadForm is the model behind the upload form.
* @author duncan <[duncan@mail.npust.edu.tw]>
*/
class UploadForm extends Model
{
	/**
	 * @var UploadedFile|Null file attribute
	 */
	public $file;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
	    return [
	        [['file'], 'file'],
	        [['file'], 'safe'],
	    ];
	}
}
?>