<?php namespace App\Http\Controllers;

use Illuminate\Http\Response as IlluminateResponse;
use App\Http\Controllers\Controller;
use Input;

class ApiController extends Controller
{

    /**
     * @var int
     */
    protected $status_code = IlluminateResponse::HTTP_OK;

    /**
     * @var string
     */
    protected $status = 'ok';

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * @param int $status_code
     *
     * @return $this
     */
    public function setStatusCode( $status_code )
    {
        $this->status_code = $status_code;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus( $status )
    {
        $this->status = $status;
    }

    /**
     * @param       $data
     * @param array $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond( $data, $headers = [ ] )
    {
        return \Response::json( $data, $this->getStatusCode(), $headers );
    }

    /**
     * @param $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondData( $data )
    {
        return $this->respond( [
            'status' => $this->getStatus(),
            'data'   => $data
        ] );
    }

    /**
     * @param null $message
     * @param null $errors
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondError( $message = null, $errors = null )
    {
        $this->setStatus( 'error' );
        if ( $this->getStatusCode() == IlluminateResponse::HTTP_OK )
        {
            $this->setStatusCode( IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY );
        }

        return $this->respond( [
            'status' => $this->getStatus(),
            'error'  => [
                'message'     => $message,
                'status_code' => $this->getStatusCode(),
                'errors'      => $errors
            ]
        ] );
    }

    /**
     * @param null $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondForbidden( $message = null )
    {
        $this->setStatusCode( IlluminateResponse::HTTP_FORBIDDEN );

        return $this->respond( [
            'status' => $this->getStatus(),
            'error'  => [
                'message'     => $message,
                'status_code' => $this->getStatusCode(),
            ]
        ] );
    }

    /**
     * @param null $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondUnauthorized( $message = null )
    {
        if ( $message === null )
        {
            $message = trans( 'app.api.unauthorized' );
        }

        return $this->setStatusCode( IlluminateResponse::HTTP_UNAUTHORIZED )->respondError( $message );
    }

    /**
     * @param null $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound( $message = null )
    {
        if ( $message === null )
        {
            $message = trans( 'app.api.not_found' );
        }

        return $this->setStatusCode( IlluminateResponse::HTTP_NOT_FOUND )->respondError( $message );
    }

    /**
     * @param null $message
     * @param null $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function respondCreated( $message = null, $data = null )
    {
        return $this->setStatusCode( IlluminateResponse::HTTP_CREATED )->respond( [
            'status'  => $this->getStatus(),
            'message' => $message,
            'data'    => $data
        ] );
    }

    /**
     * @param null $message
     * @param null $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondUpdated( $message = null, $data = null )
    {
        return $this->setStatusCode( IlluminateResponse::HTTP_OK )->respond( [
            'status'  => $this->getStatus(),
            'message' => $message,
            'data'    => $data
        ] );
    }

    /**
     * @param null $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondDeleted( $message = null )
    {
        return $this->setStatusCode( IlluminateResponse::HTTP_OK )->respond( [
            'status'  => $this->getStatus(),
            'message' => $message
        ] );
    }

    /**
     * @param null $message
     * @param null $errors
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondInvalidInput( $message = null, $errors = null )
    {
        return $this->setStatusCode( IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY )->respondError( $message, $errors );
    }

    /**
     * @param null $message
     * @param null $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondSuccess( $message = null, $data = null )
    {
        return $this->setStatusCode( IlluminateResponse::HTTP_OK )->respond( [
            'status'  => $this->getStatus(),
            'message' => $message,
            'data'    => $data
        ] );
    }
}