<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBiayaRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'nama' => 'required|unique:biayas,nama',
      'jumlah' => 'required',
    ];
  }

  /**
   * Prepare the data for validation.
   *
   * @return void
   */
  protected function prepareForValidation()
  {
    $this->merge([
      'jumlah' => \str_replace('.', '', $this->jumlah),
      'name' => strtolower($this->name),
    ]);
  }
}
