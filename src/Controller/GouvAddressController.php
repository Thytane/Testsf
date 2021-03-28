<?php

namespace App\Controller;

use App\Entity\AddressCallLog;
use App\Service\AddressSearcher;
use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GouvAddressController extends AbstractController
{

  /**
   * @Route(
   *     name="gouv_address",
   *     path="api/adresses",
   *     methods={"POST"},
   *     defaults={
   *       "_controller"="\App\Controller\GouvAddressController::getAddressFromGouv",
   *     }
   *   )
   */
  public function getAddressFromGouv(Request $request, AddressSearcher $searcher) {

    // Check if the string to search is set
    if ($request->query->get('adresse')) {

      // Collect data to persist entity
      $search = $request->query->get('adresse');
      $ip = $this->container->get('request_stack')->getCurrentRequest()->getClientIp();
      $date = new \DateTime('NOW');

      // Log request data
      $em = $this->getDoctrine()->getManager();
      $log = new AddressCallLog();
      $log->setIP($ip);
      $log->setDate($date);
      $log->setSearch($search);
      $em->persist($log);
      $em->flush();

      // Service to get the list of addresses related to $search string
      $address_list = $searcher->getJsonAddress($search);

      return new JsonResponse($address_list);
    }
    else {
      return new JsonResponse('No argument has been passed to the request. Please provide it to execute the search.');
    }
  }

}
