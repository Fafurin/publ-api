<?php

namespace App\Controller;

use App\Attribute\RequestFile;
use App\Command\Admin\BookFile\UploadBookFile;
use App\Command\Admin\BookFile\UploadBookFilesInterface;
use App\Query\Admin\BookFile\BookFileQueryInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotNull;

class BookFileController extends AbstractController
{
    public function __construct(
        private readonly BookFileQueryInterface $bookFileQuery,
        private readonly UploadBookFilesInterface $uploadBookFiles,
    ) {
    }

    #[OA\Response(
        response: 200,
        description: 'Returns book file by id',
        content: new Model(type: BinaryFileResponse::class)
    )]
    #[Route('/api/v1/downloadFile/{id}', methods: ['GET'])]
    public function downloadFile(int $id): BinaryFileResponse
    {
        $path = '../public' . $this->bookFileQuery->getBookFile($id)->getPath();
        $response = new BinaryFileResponse($path);
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT);

        return $response;

    }

    #[OA\Response(
        response: 200,
        description: 'Book files have been successfully uploaded to the server',
    )]
    #[Route('/api/v1/orders/{id}/uploadFiles', methods: ['POST'])]
    public function uploadFiles(
        int       $id,
        #[RequestFile(field: 'file', constraints: [
            new NotNull(),
            new File(mimeTypes: [
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'image/jpeg', 'image/png', 'image/jpg']),
        ])] array $files
    ): Response {
        return $this->json($this->uploadBookFiles->handle($id, $files));
    }

}
